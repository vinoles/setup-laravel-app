<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Referee;
use App\Models\RefereeRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameRefereeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'game_id'    => Game::query()->inRandomOrder()->value('id') ?? Game::factory(),
            'referee_id' => Referee::query()->inRandomOrder()->value('id') ?? Referee::factory(),
            'role_id'    => RefereeRole::query()->inRandomOrder()->value('id') ?? RefereeRole::factory(),
        ];
    }
}
