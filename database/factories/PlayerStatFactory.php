<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlayerStatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'game_id'   => Game::query()->inRandomOrder()->value('id') ?? Game::factory(),
            'player_id' => Player::query()->inRandomOrder()->value('id') ?? Player::factory(),
            'team_id'   => Team::query()->inRandomOrder()->value('id') ?? Team::factory(),
            'minutes'   => $this->faker->numberBetween(20, 95),
            'rating'    => $this->faker->numberBetween(50, 100),
            'metrics'   => [
                'goals'        => $this->faker->numberBetween(0, 2),
                'assists'      => $this->faker->numberBetween(0, 2),
                'shots'        => $this->faker->numberBetween(0, 5),
                'passes'       => $this->faker->numberBetween(10, 70),
                'yellow_cards' => $this->faker->numberBetween(0, 1),
                'red_cards'    => 0,
            ],
        ];
    }
}
