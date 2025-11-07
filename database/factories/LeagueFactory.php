<?php

namespace Database\Factories;

use App\Models\Federation;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LeagueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'federation_id' => Federation::query()->inRandomOrder()->value('id') ?? Federation::factory(),
            'sport_id'      => Sport::query()->inRandomOrder()->value('id') ?? Sport::factory(),
            'name'          => $this->faker->unique()->company() . ' League',
            'country'       => $this->faker->country(),
        ];
    }
}
