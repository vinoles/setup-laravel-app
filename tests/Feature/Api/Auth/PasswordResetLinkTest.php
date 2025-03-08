<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Auth\PasswordResetLinkRequest;
use Tests\Feature\TestCase;

class PasswordResetLinkTest extends TestCase
{
    /**
     * A user can requested a link for reset your password.
     *
     * @return void
     */
    #[Test]
    public function can_requested_a_link_for_reset_your_password(): void
    {
        $user = User::factory()->withPassword()->create();

        $response = $this->sendRequest(
            PasswordResetLinkRequest::make($user->email)
        );

        $response->assertSuccessful();

        $data = $response->json();

        $this->assertEquals(
            'We have emailed your password reset link.',
            $data['message']
        );
    }

    /**
     * A user cannot requested a link for reset your password if your email not exists in db..
     *
     * @return void
     */
    #[Test]
    public function cannot_requested_a_link_for_reset_your_password_if_your_email_not_exist_in_db(): void
    {
        $response = $this->sendRequest(
            PasswordResetLinkRequest::make('email-not-exists@mail.com')
        );

        $response->assertUnprocessable();

        $response->assertInvalid([
            'email' =>  "We can't find a user with that email address.",
        ]);

        $data = $response->json();

        $this->assertEquals(
            "We can't find a user with that email address.",
            $data['message']
        );
    }
}
