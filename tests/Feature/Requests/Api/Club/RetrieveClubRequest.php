<?php

namespace Tests\Feature\Requests\Api\Club;

use App\Models\Club;
use Tests\Feature\Requests\GetRequest;

class RetrieveClubRequest extends GetRequest
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
        return route('v1.api.clubs.show', ['club' => $this->club]);
    }
}
