<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SportFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->unique()->lexify('???')),
            'name' => $this->faker->randomElement([
                'Football', 'Basketball', 'Volleyball', 'Baseball', 'Tennis', 'Handball'
            ]),
        ];
    }
}
