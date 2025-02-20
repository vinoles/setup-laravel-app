<?php

namespace Tests\Feature\Requests\Auth;

use Tests\Feature\Requests\PostRequest;

class PasswordResetLinkRequest extends PostRequest
{
    /**
     * Create a new request instance.
     */
    public function __construct(string $email)
    {
        $this->with([
            'email' => $email
        ]);
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('v1.api.auth.forgot_password');
    }
}
