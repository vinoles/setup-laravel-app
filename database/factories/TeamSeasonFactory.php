<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamSeasonFactory extends Factory
{
    protected $model = \App\Models\TeamSeason::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'team_id'   => Team::query()->inRandomOrder()->value('id') ?? Team::factory(),
            'season_id' => Season::query()->inRandomOrder()->value('id') ?? Season::factory(),
            'group'     => $this->faker->randomElement([null, 'A', 'B']),
            'seed'      => $this->faker->numberBetween(1, 10),
        ];
    }
}
