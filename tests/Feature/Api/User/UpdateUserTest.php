<?php

namespace Tests\Feature\Api\User;

use App\Models\User;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\User\UpdateUserRequest;
use Tests\Feature\TestCase;

class UpdateUserTest extends TestCase
{
    /**
     * A user not logged in cannot update the user
     */
    #[Test]
    #[Group('api')]
    #[Group('api_user')]
    public function cannot_update_user_if_not_logged_in(): void
    {
        $request = UpdateUserRequest::make();

        $this->signIn(null)
            ->sendRequestApiPatchWithData($request)
            ->assertUnauthorized();
    }

    /**
     * Create user happy path
     */
    #[Test]
    #[Group('api')]
    #[Group('api_user')]
    public function update_user_happy_path(): void
    {
        $user = User::factory()->create();

        $userData = User::factory()->make();

        $request = UpdateUserRequest::make($user)
            ->fillPayload($userData);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiPatchWithData($request);

        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'first_name'  => $userData->first_name,
            'last_name'   => $userData->last_name,
            'address'     => $userData->address,
            'city'        => $userData->city,
            'country'     => $userData->country,
            'postal_code' => $userData->postal_code,
            'phone'       => $userData->phone,
        ]);
    }

    /**
     * Cannot update user if the user not found.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_user')]
    public function cannot_update_user_if_the_user_not_found(): void
    {
        $user = User::factory()->create();

        $userData = User::factory()->make();

        $request = UpdateUserRequest::make($userData)
            ->fillPayload($user);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiPatchWithData($request);

        $response->assertNotFound();

    }
}
