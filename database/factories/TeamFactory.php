<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'name'       => $this->faker->city() . ' FC',
            'short_name' => strtoupper($this->faker->lexify('???')),
            'city'       => $this->faker->city(),
            'logo_path'  => null,
        ];
    }
}
