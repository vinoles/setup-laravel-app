<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\TeamSeason;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $teamSeasons = TeamSeason::all();

        foreach ($teamSeasons as $teamSeason) {
            $players = Player::factory()->count(rand(8, 12))->create();

            foreach ($players as $player) {
                PlayerTeam::factory()->create([
                    'player_id' => $player->id,
                    'team_season_id' => $teamSeason->id,
                ]);
            }
        }
    }
}
