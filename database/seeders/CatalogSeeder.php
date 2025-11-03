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
    }
}
