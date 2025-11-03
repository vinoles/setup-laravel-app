<?php

namespace Database\Factories;

use App\Models\Federation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class FederationFactory extends Factory
{
    protected $model = Federation::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'name' => 'Federación ' . $this->faker->company(),
            'type' => $this->faker->randomElement(['national', 'regional', 'international']),
            'acronym' => strtoupper($this->faker->lexify('???')),
            'country' => $this->faker->country(),
            'foundation_year' => $this->faker->numberBetween(1900, 2020),
            'website' => $this->faker->url(),
            'contact_email' => $this->faker->companyEmail(),
        ];
    }
}
