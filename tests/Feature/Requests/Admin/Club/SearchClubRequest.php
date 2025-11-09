<?php

namespace Tests\Feature\Requests\Admin\Club;

use Tests\Feature\Requests\PostRequest;

class SearchClubRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  array  $filters
     */
    public function __construct(protected array $filters = [])
    {
        $this->payload = $filters;
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('admin.clubs.search');
    }
}
