<?php

namespace Database\Seeders;

use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $password = env('TEST_PASSWORD');

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Dogme',
            'email' => 'admin@app.com',
            'password' => Hash::make($password),
        ]);

        User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'Test',
            'email' => 'user-test@app.com',
            'password' => Hash::make($password),
        ]);
    }
}
