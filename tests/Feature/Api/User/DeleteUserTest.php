<?php

namespace Tests\Feature\Api\User;

use App\Models\User;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\User\DeleteUserRequest;
use Tests\Feature\TestCase;

class DeleteUserTest extends TestCase
{
    /**
     * A user not logged in cannot delete the user
     */
    #[Test]
    #[Group('api')]
    #[Group('api_user')]
    public function cannot_delete_user_if_not_logged_in(): void
    {
        $request = DeleteUserRequest::make();

        $this->signIn(null)
            ->sendRequestApiDelete($request)
            ->assertUnauthorized();
    }

    /**
     * Create user happy path
     */
    #[Test]
    #[Group('api')]
    #[Group('api_user')]
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
            'uuid'        => $user->uuid,
            'first_name'  => $user->first_name,
            'last_name'   => $user->last_name,
            'address'     => $user->address,
            'city'        => $user->city,
            'country'     => $user->country,
            'postal_code' => $user->postal_code,
            'phone'       => $user->phone,
        ]);
    }

    /**
     * Cannot delete user if the user not found.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_user')]
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
