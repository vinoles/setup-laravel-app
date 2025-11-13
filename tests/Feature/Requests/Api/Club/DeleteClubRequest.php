<?php

namespace Tests\Feature\Requests\Api\Club;

use App\Models\Club;
use Tests\Feature\Requests\PatchRequest;

class DeleteClubRequest extends PatchRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected ?Club $club = null)
    {
        if ($club === null) {
            $this->club = $club = Club::factory()->create();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('v1.api.clubs.destroy', ['club' => $this->club]);
    }

    /**
     * Retrieve type resource.
     */
    public function type(): string
    {
        return 'clubs';
    }

    /**
     * Retrieve uuid model
     */
    public function modelUuid(): string
    {
        return $this->club->uuid;
    }
}
