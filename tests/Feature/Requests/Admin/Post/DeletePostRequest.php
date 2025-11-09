<?php

namespace Tests\Feature\Requests\Admin\Post;

use Tests\Feature\Requests\DeleteRequest;

class DeletePostRequest extends DeleteRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  int  $postId
     */
    public function __construct(protected int $postId)
    {
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.posts.destroy', ['id' => $this->postId]);
    }
}
