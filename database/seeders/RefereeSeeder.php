<?php

namespace Database\Seeders;

use App\Models\Referee;
use Illuminate\Database\Seeder;

class RefereeSeeder extends Seeder
{
    public function run(): void
    {
        Referee::factory()->count(10)->create();
    }
}
