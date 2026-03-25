<?php

namespace Tests\Feature\Requests\Api\Post;

use App\Models\Post;
use Tests\Feature\Requests\DeleteRequest;

class DeletePostRequest extends DeleteRequest
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
        return route('v1.api.posts.destroy', ['post' => $this->post]);
    }

    /**
     * Retrieve type resource.
     */
    public function type(): string
    {
        return 'posts';
    }

    /**
     * Retrieve uuid model
     */
    public function modelUuid(): string
    {
        return $this->post->uuid;
    }
}
