<?php

namespace Database\Seeders;

use App\Models\Season;
use App\Models\Team;
use App\Models\TeamSeason;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::factory()->count(12)->create();

        Season::all()->each(function (Season $season) use ($teams) {
            $teams->random(6)->each(function (Team $team) use ($season) {
                TeamSeason::factory()->create([
                    'team_id' => $team->id,
                    'season_id' => $season->id,
                ]);
            });
        });
    }
}
