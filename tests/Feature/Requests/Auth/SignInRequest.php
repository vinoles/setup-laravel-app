<?php

namespace Tests\Feature\Requests\Auth;

use Tests\Feature\Requests\PostRequest;

class SignInRequest extends PostRequest
{
    /**
     * Create a new request instance.
     */
    public function __construct(string $email, string $password)
    {
        $this->with([
            'email' => $email,
            'password' => $password,
        ]);
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('v1.api.auth.login');
    }
}
