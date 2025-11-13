<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RefereeRoleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'code' => $this->faker->unique()->randomElement(['MAIN', 'ASSISTANT', 'FOURTH', 'VAR']),
            'name' => $this->faker->randomElement([
                'Main Referee',
                'Assistant Referee',
                'Fourth Official',
                'VAR Official',
            ]),
        ];
    }
}
