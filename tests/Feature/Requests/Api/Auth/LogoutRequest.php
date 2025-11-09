<?php

namespace Tests\Feature\Requests\Api\Auth;

use Tests\Feature\Requests\PostRequest;

class LogoutRequest extends PostRequest
{
    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('v1.api.auth.logout');
    }
}
