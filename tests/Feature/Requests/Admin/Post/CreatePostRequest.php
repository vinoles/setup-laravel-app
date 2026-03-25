<?php

namespace Tests\Feature\Requests\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Arr;
use Tests\Feature\Requests\PostRequest;

class CreatePostRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected ?Post $post = null)
    {
        if ($this->post !== null) {
            $this->fillPayload();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.posts.store');
    }

    /**
     * Fill the payload of the request based on the given post.
     */
    protected function fillPayload(): static
    {
        $this->payload = array_filter(
            Arr::except(
                $this->post->getAttributes(),
                [
                    'uuid',
                    'updated_at',
                    'created_at',
                    'id',
                    'published_at',
                    'author_id',
                    'slug',
                ]
            ),
            static fn ($value) => $value !== null
        );

        return $this;
    }
}
