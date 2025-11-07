<?php

namespace Tests\Feature\Requests\Admin\Post;

use Tests\Feature\Requests\PostRequest;

class SearchPostRequest extends PostRequest
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
        return route('admin.post.search');
    }
}
