<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Auth\SignInRequest;
use Tests\Feature\TestCase;

class SignInTest extends TestCase
{
    /**
     * A user can sign in with the correct credentials.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_auth')]
    public function can_sign_in_with_the_correct_email_and_password(): void
    {
        $user = User::factory()->withPassword()->create();

        $request = SignInRequest::make($user->email, 'password');

        $response = $this->sendRequest($request);

        $response->assertSuccessful();

        $data = $response->json('data');

        $meta = $response->json('meta');

        $this->assertEquals($user->uuid, $data['id']);
        $this->assertEquals('users', $data['type']);

        $this->assertNotEmpty($meta['token']);
    }

    /**
     * A user cannot sign in with the wrong login credentials.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_auth')]
    public function cannot_sign_in_with_the_wrong_credentials(): void
    {
        $user = User::factory()->create();

        $request = SignInRequest::make($user->email, 'wrong-password');

        $response = $this->sendRequest($request);

        $response->assertUnprocessable();

        $response->assertJsonPath('message', trans('auth.failed'));

        $this->assertGuest();
    }
}
