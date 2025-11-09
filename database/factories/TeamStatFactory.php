<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamStatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'game_id' => Game::query()->inRandomOrder()->value('id') ?? Game::factory(),
            'team_id' => Team::query()->inRandomOrder()->value('id') ?? Team::factory(),
            'metrics' => [
                'possession' => $this->faker->numberBetween(35, 65),
                'shots' => $this->faker->numberBetween(3, 15),
                'shots_on_target' => $this->faker->numberBetween(1, 10),
                'corners' => $this->faker->numberBetween(0, 8),
                'fouls' => $this->faker->numberBetween(5, 15),
            ],
        ];
    }
}
