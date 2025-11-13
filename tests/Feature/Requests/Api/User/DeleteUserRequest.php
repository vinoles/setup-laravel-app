<?php

namespace Tests\Feature\Requests\Api\User;

use App\Models\User;
use Tests\Feature\Requests\PatchRequest;

class DeleteUserRequest extends PatchRequest
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
        return route('v1.api.users.destroy', ['user' => $this->user]);
    }

    /**
     * Retrieve type resource.
     */
    public function type(): string
    {
        return 'users';
    }

    /**
     * Retrieve uuid model
     */
    public function modelUuid(): string
    {
        return $this->user->uuid;
    }
}
