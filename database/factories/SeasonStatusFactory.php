<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeasonStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'code' => $this->faker->unique()->randomElement(['PLANNED', 'ACTIVE', 'FINISHED']),
            'name' => $this->faker->randomElement([
                'Planned',
                'Active',
                'Finished',
            ]),
        ];
    }
}
