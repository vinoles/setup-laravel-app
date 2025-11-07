<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Season;
use App\Models\SeasonStatus;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    public function run(): void
    {
        $statusActive  = SeasonStatus::where('code', 'active')->first();
        $statusPlanned = SeasonStatus::where('code', 'planned')->first();

        League::all()->each(function (League $league) use ($statusActive, $statusPlanned) {
            Season::factory()->create([
                'league_id' => $league->id,
                'status_id' => $statusActive?->id ?? $statusPlanned?->id,
            ]);

            Season::factory()->create([
                'league_id' => $league->id,
                'status_id' => $statusPlanned?->id ?? $statusActive?->id,
            ]);
        });
    }
}
