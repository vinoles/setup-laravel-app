<?php

namespace Tests\Feature\Requests\Admin\Club;

use Tests\Feature\Requests\PostRequest;

class SearchClubRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected array $filters = [])
    {
        $this->payload = $filters;
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.clubs.search');
    }
}
