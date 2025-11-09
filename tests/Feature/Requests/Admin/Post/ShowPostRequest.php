<?php

namespace Tests\Feature\Requests\Admin\Post;

use Tests\Feature\Requests\GetRequest;

class ShowPostRequest extends GetRequest
{
    public function __construct(protected int $postId)
    {
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.posts.show', ['id' => $this->postId]);
    }
}
