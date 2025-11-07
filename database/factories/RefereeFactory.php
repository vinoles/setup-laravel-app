<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RefereeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'first_name'  => $this->faker->firstName(),
            'last_name'   => $this->faker->lastName(),
            'license_code'=> $this->faker->optional()->bothify('REF-###-??'),
            'nationality' => $this->faker->country(),
        ];
    }
}
