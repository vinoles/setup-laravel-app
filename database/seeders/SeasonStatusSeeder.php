<?php

namespace Database\Seeders;

use App\Models\SeasonStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SeasonStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['code' => 'planned',  'name' => 'Planificada'],
            ['code' => 'active',   'name' => 'Activa'],
            ['code' => 'finished', 'name' => 'Finalizada'],
        ];

        foreach ($statuses as $status) {
            SeasonStatus::firstOrCreate([
                'uuid' => Str::uuid(),
                'code' => $status['code'],
                'name' => $status['name'],
            ]);

        }
    }
}
