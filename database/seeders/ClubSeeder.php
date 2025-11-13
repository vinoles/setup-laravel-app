<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Team;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::factory(3)->has(Team::factory(3))
            ->create();
    }
}
