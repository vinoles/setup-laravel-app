<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Auth\RegisterRequest;
use Tests\Feature\TestCase;

class RegisterAttributesRequiredTest extends TestCase
{
    /**
     * Cannot register if the required email is missing
     *
     * @return void
     */
    #[Test]
    public function cannot_register_if_the_required_email_is_missing(): void
    {
        $user = User::factory()->make();

        $request = RegisterRequest::make()
            ->fillPayloadAndRemoveAttribute($user, ['email']);

        $response = $this->sendRequest($request);

        $response->assertJsonPath(
            'errors.email.0',
            trans('validation.required', ['attribute' => 'email'])
        );

        $response->assertStatus(422);
    }

    /**
     * Cannot register if the  email is not unique.
     *
     * @return void
     */
    #[Test]
    public function cannot_register_if_the_email_is_not_unique(): void
    {
        $user = User::factory()->create();

        $newUser = User::factory()->make($user->getAttributes());

        $request = RegisterRequest::make($newUser);

        $response = $this
            ->sendRequest($request);

        $response->assertJsonPath(
            'errors.email.0',
            trans('validation.unique', ['attribute' => 'email'])
        );
    }

    /**
     * Cannot register if without the required data.
     *
     * @return void
     */
    #[Test]
    public function cannot_register_if_without_the_required_data(): void
    {
        $user = User::factory()->create();

        $request = RegisterRequest::make()
            ->fillPayloadAndRemoveAttribute(
                $user,
                [
                    'email',
                    'first_name',
                    'last_name',
                    'birthdate',
                ]
            );

        $response = $this
            ->sendRequest($request);

        $response->assertJsonPath(
            'errors.first_name.0',
            trans('validation.required', ['attribute' => 'first name'])
        );

        $response->assertJsonPath(
            'errors.last_name.0',
            trans('validation.required', ['attribute' => 'last name'])
        );

        $response->assertJsonPath(
            'errors.email.0',
            trans('validation.required', ['attribute' => 'email'])
        );

        $response->assertJsonPath(
            'errors.birthdate.0',
            trans('validation.required', ['attribute' => 'birthdate'])
        );
    }
}
