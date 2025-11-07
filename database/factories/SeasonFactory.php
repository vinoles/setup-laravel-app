<?php

namespace Database\Factories;

use App\Models\League;
use App\Models\SeasonStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeasonFactory extends Factory
{
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-2 months', '+1 month');

        return [
            'uuid' => Str::uuid(),
            'league_id' => League::query()->inRandomOrder()->value('id') ?? League::factory(),
            'name' => $this->faker->year() . '/' . ($this->faker->dateTimeBetween('next year', '+1 year')->format('Y')),
            'start_date'=> $start,
            'end_date'  => (clone $start)->modify('+5 months'),
            'status_id' => SeasonStatus::query()->inRandomOrder()->value('id') ?? SeasonStatus::factory(),
        ];
    }
}
