<?php

namespace Tests\Feature\Requests\Api\Post;

use App\Models\Post;
use Tests\Feature\Requests\GetRequest;

class RetrievePostRequest extends GetRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected ?Post $post = null)
    {
        if ($post === null) {
            $this->post = $post = Post::factory()->create();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('v1.api.posts.show', ['post' => $this->post]);
    }
}
