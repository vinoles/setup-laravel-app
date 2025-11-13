<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\PlayerStat;
use App\Models\PlayerTeam;
use Illuminate\Database\Seeder;

class PlayerStatSeeder extends Seeder
{
    public function run(): void
    {
        Game::with(['homeTeam', 'awayTeam'])->chunk(50, function ($games) {
            foreach ($games as $game) {
                $teams = collect([$game->homeTeam, $game->awayTeam])->filter();

                foreach ($teams as $team) {
                    $players = PlayerTeam::whereHas('teamSeason', function ($q) use ($team) {
                        $q->where('team_id', $team->id);
                    })
                        ->with('player')
                        ->inRandomOrder()
                        ->take(rand(4, 6))
                        ->get()
                        ->pluck('player');

                    foreach ($players as $player) {
                        PlayerStat::factory()->create([
                            'game_id'   => $game->id,
                            'player_id' => $player->id,
                            'team_id'   => $team->id,
                        ]);
                    }
                }
            }
        });
    }
}
