<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\Feature\Requests\Api\UpdateUserRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UpdateUserTest extends TestCase
{

    /**
    * A user not logged in cannot update the user
    *
    * @return void
    */
    #[Test]
    public function cannot_update_user_if_not_logged_in(): void
    {
        $request = UpdateUserRequest::make();

        $this->signIn(null)
            ->sendRequestApiPatchWithData($request)
            ->assertUnauthorized();
    }

    /**
     * Create user happy path
     *
     * @return void
     */
    #[Test]
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
            'first_name' => $userData->first_name,
            'last_name' => $userData->last_name,
            'address' => $userData->address,
            'city' => $userData->city,
            'country' => $userData->country,
            'postal_code' => $userData->postal_code,
            'phone' => $userData->phone,
        ]);
    }

    /**
     * Cannot update user if the user not found.
     *
     * @return void
     */
    #[Test]
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
