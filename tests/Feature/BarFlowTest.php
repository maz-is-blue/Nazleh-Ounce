<?php

namespace Tests\Feature;

use App\Models\Bar;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BarFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_verification_page_shows_owner_name(): void
    {
        $owner = User::factory()->create(['name' => 'Aisha']);
        $bar = Bar::factory()->create([
            'owner_user_id' => $owner->id,
            'status' => 'sold',
        ]);

        $response = $this->get('/bar/' . $bar->public_id);

        $response->assertOk();
        $response->assertSee($bar->public_id);
        $response->assertSee('Aisha');
    }

    public function test_public_verification_page_shows_not_assigned_when_unowned(): void
    {
        $bar = Bar::factory()->create([
            'owner_user_id' => null,
        ]);

        $response = $this->get('/bar/' . $bar->public_id);

        $response->assertOk();
        $response->assertSee($bar->public_id);
        $response->assertSee('Not assigned yet');
    }

    public function test_qr_route_redirects_to_bar_page(): void
    {
        $bar = Bar::factory()->create();

        $response = $this->get('/q/' . $bar->public_id);

        $response->assertRedirect('/bar/' . $bar->public_id);
    }

    public function test_public_routes_return_404_for_unknown_public_id(): void
    {
        $unknownPublicId = '01ZZZZZZZZZZZZZZZZZZZZZZZZ';

        $this->get('/q/' . $unknownPublicId)->assertNotFound();
        $this->get('/bar/' . $unknownPublicId)->assertNotFound();
    }

    public function test_user_cannot_view_someone_elses_bar(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $bar = Bar::factory()->create(['owner_user_id' => $owner->id]);

        $response = $this->actingAs($other)->get('/account/bars/' . $bar->public_id);

        $response->assertForbidden();
    }

    public function test_admin_can_assign_bar_and_non_admin_cannot(): void
    {
        $bar = Bar::factory()->create();
        $admin = User::factory()->create(['is_admin' => true]);
        $user = User::factory()->create(['is_admin' => false]);

        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $response = $this->actingAs($user)->post('/admin/bars/' . $bar->public_id . '/assign', [
            'buyer_name' => 'Buyer',
            'buyer_email' => 'buyer@example.com',
        ]);
        $response->assertForbidden();

        $response = $this->actingAs($admin)->post('/admin/bars/' . $bar->public_id . '/assign', [
            'buyer_name' => 'Buyer',
            'buyer_email' => 'buyer@example.com',
        ]);

        $response->assertRedirect('/admin/bars');
        $this->assertDatabaseHas('bars', [
            'public_id' => $bar->public_id,
            'status' => 'sold',
        ]);
    }
}
