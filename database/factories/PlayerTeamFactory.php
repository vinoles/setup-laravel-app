<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\TeamSeason;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlayerTeamFactory extends Factory
{
    protected $model = PlayerTeam::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'player_id'      => Player::query()->inRandomOrder()->value('id') ?? Player::factory(),
            'team_season_id' => TeamSeason::query()->inRandomOrder()->value('id') ?? TeamSeason::factory(),
            'jersey_number'  => (string) $this->faker->numberBetween(1, 99),
            'start_date'     => $this->faker->optional()->date(),
            'end_date'       => null,
        ];
    }
}
