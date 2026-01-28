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
        $metalType = $this->faker->randomElement(['gold', 'silver']);
        $weight = 100.000;
        $humanCodePrefix = Bar::resolveHumanCodePrefix($metalType, $weight);

        return [
            'public_id' => (string) Str::ulid(),
            'human_code_number' => $humanCodePrefix
                ? Bar::allocateHumanCodeNumbersForPrefix($humanCodePrefix, 1)[0] ?? null
                : null,
            'human_code_prefix' => $humanCodePrefix,
            'metal_type' => $metalType,
            'weight' => $weight,
            'purity' => '999.9',
            'status' => 'unsold',
            'owner_user_id' => null,
            'sold_at' => null,
        ];
    }
}
