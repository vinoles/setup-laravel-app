<?php

namespace Tests\Feature\Auth;

use Tests\Feature\Requests\User\ConfirmPasswordRequest;
use App\Models\User;
use Illuminate\Http\Response;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Auth\LogoutRequest;
use Tests\Feature\Requests\Auth\SignInRequest;
use Tests\Feature\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A user can sign in with the correct credentials,
     * confirm password make logout and cannot confirm password.
     *
     * @return void
     */
    #[Test]
    public function logout_user(): void
    {
        $user = User::factory()->withPassword()->create();

        $request = SignInRequest::make($user->email, 'password');
        $response = $this->sendRequest($request);

        $response->assertSuccessful();

        $data = $response->json('data');

        $meta = $response->json('meta');

        $this->assertEquals($user->uuid, $data['id']);
        $this->assertEquals('users', $data['type']);

        $token = $meta['token'];

        $this->assertNotEmpty($token);

        $confirmPasswordRequest = ConfirmPasswordRequest::make($user->fresh(), 'password');

        $responseConfirmPassword = $this
            ->sendRequestApiPostWithPayloadAndToken(
                $confirmPasswordRequest,
                $token
            );

        $responseConfirmPassword->assertSuccessful();

        $data = $responseConfirmPassword->json('meta');

        $this->assertTrue($data["status"]);

        $responseLogout = $this->sendRequest(LogoutRequest::make());

        $responseLogout->assertStatus(Response::HTTP_NO_CONTENT);

        $user->refresh();

        $this->assertNull($user->currentAccessToken());

        $confirmPasswordRequest = ConfirmPasswordRequest::make($user, 'password');

        $responseConfirmPassword = $this->sendRequestApiPostWithPayloadAndToken(
                $confirmPasswordRequest,
                $token
            );

        $responseConfirmPassword->assertUnauthorized();

    }
}
