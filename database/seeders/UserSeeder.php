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
        $password = env('TEST_PASSWORD', 'password');

        // Create random users with different roles
        User::factory(5)->create()->each(function ($user) {
            $roles = [UserRole::TALENT->value, UserRole::SCOUT->value, UserRole::CLUB->value];
            $user->assignRole($roles[array_rand($roles)]);
        });

        // Create specific test users with known roles

        $superAdmin = User::factory()->create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@setup-laravel-app.com',
            'password' => Hash::make($password),
        ]);
        $superAdmin->assignRole(UserRole::ADMIN->value);

        $admin = User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Application',
            'email' => 'admin@setup-laravel-app.com',
            'password' => Hash::make($password),
        ]);
        $admin->assignRole(UserRole::SUPER_ADMIN->value);

        $talent = User::factory()->create([
            'first_name' => 'Lionel',
            'last_name' => 'Messi',
            'email' => 'messi@setup-laravel-app.com',
            'password' => Hash::make($password),
        ]);
        $talent->assignRole(UserRole::TALENT->value);

        $scout = User::factory()->create([
            'first_name' => 'Jose',
            'last_name' => 'Mourinho',
            'email' => 'mourinho@setup-laravel-app.com',
            'password' => Hash::make($password),
        ]);
        $scout->assignRole(UserRole::SCOUT->value);

        $club = User::factory()->create([
            'first_name' => 'Real',
            'last_name' => 'Madrid',
            'email' => 'realmadrid@setup-laravel-app.com',
            'password' => Hash::make($password),
        ]);
        $club->assignRole(UserRole::CLUB->value);

        // Create a user without role for testing
        User::factory()->create([
            'first_name' => 'No',
            'last_name' => 'Role',
            'email' => 'norole@setup-laravel-app.com',
            'password' => Hash::make($password),
        ]);

        // Create a user  for testing api
        User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'Test',
            'email' => 'user-test@setup-laravel-app.com',
            'password' => Hash::make($password),
        ]);
    }
}
