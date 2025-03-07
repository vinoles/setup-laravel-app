<?php

namespace Tests\Feature\Auth;

use App\Models\User;

use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\User\DeleteUserRequest;

class DeleteUserTest extends TestCase
{

    /**
    * A user not logged in cannot delete the user
    *
    * @return void
    */
    #[Test]
    public function cannot_delete_user_if_not_logged_in(): void
    {
        $request = DeleteUserRequest::make();

        $this->signIn(null)
            ->sendRequestApiDelete($request)
            ->assertUnauthorized();
    }

    /**
     * Create user happy path
     *
     * @return void
     */
    #[Test]
    public function delete_user_happy_path(): void
    {
        $user = User::factory()->create();

        $request = DeleteUserRequest::make($user);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiDelete($request);

        $response->assertSuccessful();

        $response->assertNoContent();

        $this->assertDatabaseMissing('users', [
            'uuid' => $user->uuid,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'address' => $user->address,
            'city' => $user->city,
            'country' => $user->country,
            'postal_code' => $user->postal_code,
            'phone' => $user->phone,
        ]);
    }

    /**
     * Cannot delete user if the user not found.
     *
     * @return void
     */
    #[Test]
    public function cannot_delete_user_if_the_user_not_found(): void
    {
        $user = User::factory()->create();

        $request = DeleteUserRequest::make($user);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiDelete($request);

        $response->assertSuccessful();

        $response->assertNoContent();

        $response = $this->signIn($authUser)
            ->sendRequestApiDelete($request);
        $response->assertNotFound();

    }
}
