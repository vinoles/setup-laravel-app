<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,  // Must run first to create roles and permissions
            CatalogSeeder::class,
        ]);

        $this->call([
            FederationSeeder::class,
            LeagueSeeder::class,
            SeasonSeeder::class,
            ClubSeeder::class,
            TeamSeeder::class,
            PlayerSeeder::class,
            RefereeSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            GameSeeder::class,
            PlayerStatSeeder::class,
            TeamStatSeeder::class,
        ]);
    }
}
