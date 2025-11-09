<?php

namespace Tests\Feature\Requests\Admin\Club;

use App\Models\Club;
use Illuminate\Support\Arr;
use Tests\Feature\Requests\PostRequest;

class CreateClubRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  Club|null  $club
     */
    public function __construct(protected ?Club $club = null)
    {
        if ($this->club !== null) {
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
        return route('admin.clubs.store');
    }

    /**
     * Fill the payload of the request based on the given club.
     *
     * @return static
     */
    protected function fillPayload(): static
    {
        $this->payload = array_filter(
            Arr::except(
                $this->club->getAttributes(),
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
}
