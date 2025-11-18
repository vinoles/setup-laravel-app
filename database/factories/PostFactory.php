<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid'         => Str::uuid(),
            'title'        => fake()->sentence(random_int(3, 10), false),
            'published_at' => now(),
            'content'      => fake()->paragraph(),
            'author_id'    => User::factory(),
        ];
    }
}
