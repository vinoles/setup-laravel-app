<?php

namespace Tests\Feature\Requests\Admin\Club;

use App\Models\Club;
use Illuminate\Support\Arr;
use Tests\Feature\Requests\PutRequest;

class UpdateClubRequest extends PutRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  Club  $club
     * @param  Club|null  $updatedClub
     */
    public function __construct(
        protected Club $club,
        protected ?Club $updatedClub = null
    ) {
        if ($this->updatedClub !== null) {
            $this->fillPayload();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('admin.clubs.update', ['id' => $this->club->id]);
    }

    /**
     * Fill the payload of the request based on the given updated club.
     *
     * @return static
     */
    protected function fillPayload(): static
    {
        $this->payload = array_filter(
            Arr::except(
                $this->updatedClub->getAttributes(),
                [
                    'uuid',
                    'updated_at',
                    'created_at',
                    'id',
                ]
            ),
            static fn ($value) => $value !== null
        );

        // Add id required for Backpack update operation
        $this->payload['id'] = $this->club->id;

        return $this;
    }
}

