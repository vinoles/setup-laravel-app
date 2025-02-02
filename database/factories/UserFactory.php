<?php

namespace Database\Factories;

use App\Constants\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->streetAddress,
            'city' => fake()->city(),
            'country' => fake()->country(),
            'postal_code' => fake()->postcode,
            'email_verified_at' => now(),
            'birthdate' => now()->subYears(random_int(15, 20)),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(static fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicates that the user has a password.
     *
     * @param  string  $password
     * @return static
     */
    public function withPassword(string $password = 'password'): static
    {
        return $this->state([
            'password' => Hash::make($password),
        ]);
    }

    /**
     * Indicate the birthdate.
     */
    public function withBirthdate(Carbon $birthdate): static
    {
        return $this->state([
            'birthdate' => $birthdate->format('Y-m-d'),
        ]);
    }

    /**
     * Indicates that the user has a password.
     *
     * @param  string  $password
     * @return static
     */
    public function withFirstName(string $firstName): static
    {
        return $this->state([
            'first_name' => $firstName,
        ]);
    }
}
