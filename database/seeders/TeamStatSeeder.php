<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\TeamStat;
use Illuminate\Database\Seeder;

class TeamStatSeeder extends Seeder
{
    public function run(): void
    {
        Game::with(['homeTeam', 'awayTeam'])->chunk(50, function ($games) {
            foreach ($games as $game) {
                if ($game->homeTeam) {
                    TeamStat::factory()->create([
                        'game_id' => $game->id,
                        'team_id' => $game->home_team_id,
                    ]);
                }

                if ($game->awayTeam) {
                    TeamStat::factory()->create([
                        'game_id' => $game->id,
                        'team_id' => $game->away_team_id,
                    ]);
                }
            }
        });
    }
}
