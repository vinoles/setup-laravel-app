<?php

namespace Database\Seeders;

use App\Models\Federation;
use App\Models\League;
use App\Models\Sport;
use Illuminate\Database\Seeder;

class LeagueSeeder extends Seeder
{
    public function run(): void
    {
        $federations = Federation::all();
        $sports = Sport::all();

        foreach ($federations as $federation) {
            League::factory()
                ->count(2)
                ->create([
                    'federation_id' => $federation->id,
                    'sport_id'      => $sports->random()->id,
                ]);
        }
    }
}
