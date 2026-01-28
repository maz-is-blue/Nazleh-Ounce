<?php

namespace Database\Factories;

use App\Models\Bar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BarFactory extends Factory
{
    protected $model = Bar::class;

    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'human_code_number' => Bar::allocateHumanCodeNumbers(1)[0] ?? null,
            'metal_type' => $this->faker->randomElement(['gold', 'silver']),
            'weight' => 100.000,
            'purity' => '999.9',
            'status' => 'unsold',
            'owner_user_id' => null,
            'sold_at' => null,
        ];
    }
}
