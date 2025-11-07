<?php

namespace Database\Seeders;

use App\Models\RefereeRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RefereeRoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['code' => 'main',        'name' => 'Árbitro principal'],
            ['code' => 'assistant_1', 'name' => 'Árbitro asistente 1'],
            ['code' => 'assistant_2', 'name' => 'Árbitro asistente 2'],
            ['code' => 'var',         'name' => 'Árbitro VAR'],
        ];

        foreach ($roles as $role) {
             RefereeRole::firstOrCreate([
                'uuid' => Str::uuid(),
                'code' => $role['code'],
                'name' => $role['name'],
            ]);
        }
    }
}
