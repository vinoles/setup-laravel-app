<?php

namespace Database\Seeders;

use App\Models\Season;
use App\Models\Game;
use App\Models\Team;
use App\Models\Referee;
use App\Models\RefereeRole;
use App\Models\GameStatus;
use App\Models\GameReferee;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $referees = Referee::all();
        $roles    = RefereeRole::all();
        $statuses = GameStatus::all();

        Season::with('league')->get()->each(function (Season $season) use ($referees, $roles, $statuses) {
            $teams = Team::whereHas('teamSeasons', function ($query) use ($season) {
                $query->where('season_id', $season->id);
            })->get();
            for ($i = 0; $i < 10; $i++) {
                $home = $teams->random();
                $away = $teams->where('id', '!=', $home->id)->random();

                $game = Game::factory()->create([
                    'season_id'   => $season->id,
                    'home_team_id'=> $home->id,
                    'away_team_id'=> $away->id,
                    'status_id'   => $statuses->random()->id,
                ]);

                $referees->random(3)->values()->each(function ($ref, $index) use ($game, $roles) {
                    GameReferee::factory()->create([
                        'game_id'    => $game->id,
                        'referee_id' => $ref->id,
                        'role_id'    => $roles[$index % $roles->count()]->id,
                    ]);
                });
            }
        });
    }
}
