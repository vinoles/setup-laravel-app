<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SportSeeder::class,  // Must run first to create roles and permissions
            GameStatusSeeder::class,
            SeasonStatusSeeder::class,
            RefereeRoleSeeder::class,
        ]);
//        Sport::factory()->count(6)->create();
//        GameStatus::factory()->count(5)->create();
//        SeasonStatus::factory()->count(3)->create();
//        RefereeRole::factory()->count(4)->create();
    }
}
