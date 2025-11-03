<?php

namespace Database\Seeders;

use App\Models\Federation;
use Illuminate\Database\Seeder;

class FederationSeeder extends Seeder
{
    public function run(): void
    {
        Federation::factory()
            ->count(3)
            ->create();
    }
}
