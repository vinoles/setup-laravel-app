<?php

namespace Tests\Feature\Requests\Api\Club;

use App\Models\Club;
use Illuminate\Support\Arr;
use Tests\Feature\Requests\PostRequest;

class CreateClubRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected ?Club $club = null)
    {
        if ($this->club !== null) {
            $this->fillPayload();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('v1.api.clubs.store');
    }

    /**
     * Retrieve type resource.
     */
    public function type(): string
    {
        return 'clubs';
    }

    /**
     * Retrieve relationships (empty for clubs).
     */
    public function relationships(): array
    {
        return [];
    }

    /**
     * Fill the payload of the request based on the given club.
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
