<?php

namespace Tests\Feature\Requests\Api\Club;

use App\Models\Club;
use Illuminate\Support\Arr;
use Tests\Feature\Requests\PatchRequest;

class UpdateClubRequest extends PatchRequest
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
        return route('v1.api.clubs.update', ['club' => $this->club]);
    }

    /**
     * Fill the payload of the request based on the given club.
     *
     * @param  Club  $club
     * @return static
     */
    public function fillPayload(Club $club): static
    {
        $this->payload = array_filter(
            Arr::except(
                $club->getAttributes(),
                [
                    'uuid',
                    'updated_at',
                    'created_at',
                    'id',
                ]
            ),
            static fn ($value) => $value !== null
        );

        return $this;
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

