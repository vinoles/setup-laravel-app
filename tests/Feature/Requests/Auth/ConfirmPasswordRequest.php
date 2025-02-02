<?php

namespace Tests\Feature\Requests\Auth;

use App\Models\User;
use Tests\Feature\Requests\PostRequest;

class ConfirmPasswordRequest extends PostRequest
{
    /**
     * Create a new request instance.
     */
    public function __construct(protected User $user, protected string $password)
    {
        $this->with([
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
        return route('v1.api.auth.password.confirm', ['user' => $this->user]);
    }
}
