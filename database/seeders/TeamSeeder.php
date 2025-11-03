<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Season;
use App\Models\TeamSeason;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos un pool de equipos global
        $teams = Team::factory()->count(12)->create();

        // Cada temporada toma 6 equipos
        Season::all()->each(function (Season $season) use ($teams) {
            $teams->random(6)->each(function (Team $team) use ($season) {
                TeamSeason::factory()->create([
                    'team_id'   => $team->id,
                    'season_id' => $season->id,
                ]);
            });
        });
    }
}
