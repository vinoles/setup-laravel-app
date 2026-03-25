<?php

namespace Tests\Feature\Requests\Api\Post;

use App\Models\Post;
use Illuminate\Support\Arr;
use Tests\Feature\Requests\PatchRequest;

class UpdatePostRequest extends PatchRequest
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
        return route('v1.api.posts.update', ['post' => $this->post]);
    }

    /**
     * Fill the payload of the request based on the given post.
     */
    public function fillPayload(Post $post): static
    {
        $this->payload = array_filter(
            Arr::except(
                $post->getAttributes(),
                [
                    'uuid',
                    'updated_at',
                    'created_at',
                    'id',
                    'published_at',
                    'slug',
                    'author_id',
                ]
            ),
            static fn ($value) => $value !== null
        );

        return $this;
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
