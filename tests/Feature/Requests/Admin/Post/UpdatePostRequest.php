<?php

namespace Tests\Feature\Requests\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Arr;
use Tests\Feature\Requests\PutRequest;

class UpdatePostRequest extends PutRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(
        protected Post $post,
        protected ?Post $updatedPost = null
    ) {
        if ($this->updatedPost !== null) {
            $this->fillPayload();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.post.update', ['id' => $this->post->id]);
    }

    /**
     * Fill the payload of the request based on the given updated post.
     */
    protected function fillPayload(): static
    {
        $this->payload = array_filter(
            Arr::except(
                $this->updatedPost->getAttributes(),
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

        // Add id required for Backpack update operation
        $this->payload['id'] = $this->post->id;

        return $this;
    }
}
