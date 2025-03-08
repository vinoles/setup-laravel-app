<?php

namespace Tests\Feature\Api\User;

use App\Models\User;
use Tests\Feature\Requests\Api\User\CreateUserRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CreateUserTest extends TestCase
{
    /**
    * A user not logged in cannot create the user
    *
    * @return void
    */
    #[Test]
    public function cannot_create_user_if_not_logged_in(): void
    {
        $request = CreateUserRequest::make();

        $this->signIn(null)
            ->sendRequestApiPostWithData($request)
            ->assertUnauthorized();
    }

    /**
     * Create user happy path
     *
     * @return void
     */
    #[Test]
    public function create_user_happy_path(): void
    {
        $user = User::factory()->make();

        $request = CreateUserRequest::make($user);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiPostWithData($request);

        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
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
     * Cannot create user if without the required data.
     *
     * @return void
     */
    #[Test]
    public function cannot_create_user_if_without_the_required_data(): void
    {
        $user = User::factory()->create();

        $request = CreateUserRequest::make()
            ->fillPayloadAndRemoveAttribute(
                $user,
                [
                    'email',
                    'first_name',
                    'last_name',
                    'birthdate',
                ]
            );

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiPostWithData($request);

        $response->assertUnprocessable();

        $errors = collect($response->json('errors'))->pluck('detail')->all();

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'first name']),
            $errors
        );

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'last name']),
            $errors
        );

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'email']),
            $errors
        );

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'birthdate']),
            $errors
        );
    }
}
