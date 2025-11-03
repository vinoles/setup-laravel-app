<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'code' => $this->faker->unique()->randomElement(['SCHEDULED', 'IN_PROGRESS', 'FINISHED', 'POSTPONED', 'CANCELLED']),
            'name' => $this->faker->randomElement([
                'Scheduled',
                'In Progress',
                'Finished',
                'Postponed',
                'Cancelled'
            ]),
        ];
    }
}
