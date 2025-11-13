<?php

namespace Tests\Feature\Requests\Api\Club;

use Tests\Feature\Requests\GetRequest;

class RetrieveClubsRequest extends GetRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected array $query = [], protected array $filters = []) {}

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('v1.api.clubs.index');
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function expects(): string
    {
        return 'clubs';
    }

    /**
     * Retrieve the query for request.
     *
     * @return string
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * Retrieve the query for request.
     *
     * @return string
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}
