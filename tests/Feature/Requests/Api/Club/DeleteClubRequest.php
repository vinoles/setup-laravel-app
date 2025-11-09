<?php

namespace Tests\Feature\Requests\Api\Club;

use App\Models\Club;
use Tests\Feature\Requests\PatchRequest;

class DeleteClubRequest extends PatchRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  Club|null  $club
     */
    public function __construct(protected Club|null $club = null)
    {
        if ($club === null) {
            $this->club = $club = Club::factory()->create();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('v1.api.clubs.destroy', ['club' => $this->club]);
    }

    /**
    * Retrieve type resource.
    *
    * @return string
    */
    public function type(): string
    {
        return 'clubs';
    }

    /**
    * Retrieve uuid model
    *
    * @return string
    */
    public function modelUuid(): string
    {
        return $this->club->uuid;
    }
}
