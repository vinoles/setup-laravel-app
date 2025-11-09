<?php

namespace Database\Seeders;

use App\Models\GameStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['code' => 'scheduled',   'name' => 'Programado'],
            ['code' => 'in_progress', 'name' => 'En juego'],
            ['code' => 'finished',    'name' => 'Finalizado'],
        ];

        foreach ($statuses as $status) {
            GameStatus::firstOrCreate([
               'uuid' => Str::uuid(),
               'code' => $status['code'],
               'name' => $status['name'],
            ]);
        }
    }
}
