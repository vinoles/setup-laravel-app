<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthdate' => $this->faker->optional()->date(),
            'nationality' => $this->faker->country(),
            'position' => $this->faker->randomElement(['GK', 'DF', 'MF', 'FW']),
            'height_cm' => $this->faker->numberBetween(160, 195),
            'weight_kg' => $this->faker->numberBetween(55, 95),
        ];
    }
}
