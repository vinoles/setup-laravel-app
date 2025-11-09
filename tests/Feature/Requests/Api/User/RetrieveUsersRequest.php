<?php

namespace Tests\Feature\Requests\Api\User;

use Tests\Feature\Requests\GetRequest;

class RetrieveUsersRequest extends GetRequest
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
        return route('v1.api.users.index');
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function expects(): string
    {
        return 'users';
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
