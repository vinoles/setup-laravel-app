<?php

namespace Tests\Feature\Concerns;

use App\Models\User;
use Database\Factories\UserFactory;

trait CreatesUsers
{
    /**
     * Retrieve the factory used to create a new user instance.
     *
     * @param  int|null  $count
     * @param  array  $state
     * @return \Database\Factories\UserFactory
     */
    protected function newUserFactory(int $count = null, array $state = []): UserFactory
    {
        return User::factory($count, $state);
    }

    /**
     * Create a new user.
     *
     * @param  array  $attributes
     * @return \App\Models\User
     */
    protected function newUser(array $attributes = []): User
    {
        return $this->newUserFactory()->create($attributes);
    }
}
