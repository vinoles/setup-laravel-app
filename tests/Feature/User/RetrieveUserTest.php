<?php

namespace Tests\Feature\Api\User;
use App\Models\User;
use Illuminate\Http\Response;
use Tests\Feature\Requests\Api\RetrieveUserRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Test;

class RetrieveUserTest extends TestCase
{
    /**
     * A user not logged in cannot retrieve the user
     *
     * @return void
     */
    #[Test]
    public function cannot_retrieve_user_if_not_logged_in(): void
    {
        $request = RetrieveUserRequest::make();

        $this->signIn(null)
            ->sendRequestApiGetShow($request)
            ->assertUnauthorized()
            ->assertStatus(Response::HTTP_UNAUTHORIZED);

    }

    /**
     * A user logged in can retrieve the user with permissions
     *
     * @return void
     */
    #[Test]
    public function can_retrieve_user_if_is_logged_with_permissions(): void
    {
        $user = User::factory()->create();

        $request = RetrieveUserRequest::make($user);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiGetShow($request);

        $response->assertSuccessful();

        $response->assertStatus(Response::HTTP_OK);

        $data = $response->json('data');

        $this->assertEquals($data['id'], $user->uuid);

        $this->assertDatabaseHas('users', [
            'id' => $user->id
        ]);

    }

    /**
     * A user cannot retrieve the user without permissions
     *
     * @return void
     */
    #[Test]
    public function cannot_retrieve_user_without_permissions(): void
    {
        $this->markTestSkipped("Skipped test await for implement roles in user");

        $user = User::factory()->create();

        $request = RetrieveUserRequest::make($user);

        $notAdminUser = User::factory()->create();

        $response = $this->signIn($notAdminUser)
            ->sendRequestApiGetShow($request);

        $response->assertForbidden();

        $response->assertStatus(Response::HTTP_FORBIDDEN);

    }

    /**
     * A user cannot see a user that doesn't exist
     *
     * @return void
     */
    #[Test]
    public function cannot_see_a_user_that_doesnt_exist(): void
    {
        $user = User::factory()->create();

        $request = RetrieveUserRequest::make($user);

        $user->delete();

        $user = User::factory()->create();

        $response = $this->signIn($user)
            ->sendRequestApiGetShow($request);

        $response->assertNotFound();

        $response->assertStatus(Response::HTTP_NOT_FOUND);

        $data = $response->json('errors');

        $response->assertStatus($data[0]["status"]);
    }

}
