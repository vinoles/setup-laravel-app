<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SportSeeder extends Seeder
{
    public function run(): void
    {
        $fixed = [
            ['code' => 'football',   'name' => 'Fútbol'],
            ['code' => 'basketball', 'name' => 'Baloncesto'],
            ['code' => 'baseball', 'name' => 'Baseball'],
        ];

        foreach ($fixed as $item) {
            Sport::firstOrCreate([
                'uuid' => Str::uuid(),
                'code' => $item['code'],
                'name' => $item['name'],
            ]);
        }
;
    }
}
