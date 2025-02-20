<?php

namespace Tests\Feature\Requests\Auth;

use Tests\Feature\Requests\PostRequest;

class LogoutRequest extends PostRequest
{

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('v1.api.auth.logout');
    }
}
