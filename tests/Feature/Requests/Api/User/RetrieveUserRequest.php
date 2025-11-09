<?php

namespace Tests\Feature\Requests\Api\User;

use App\Models\User;
use Tests\Feature\Requests\GetRequest;

class RetrieveUserRequest extends GetRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected ?User $user = null)
    {
        if ($user === null) {
            $this->user = $user = User::factory()->create();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('v1.api.users.show', ['user' => $this->user]);
    }
}
