<?php

namespace Tests\Feature\Requests\Api\Post;

use App\Models\Post;
use Illuminate\Support\Arr;
use Tests\Feature\Concerns\UsesRelationships;
use Tests\Feature\Requests\PostRequest;

class CreatePostRequest extends PostRequest
{
    use UsesRelationships;

    /**
     * Create a new instance of the request.
     *
     * @param  Post|null  $post
     * @param  array  $relationship
     */
    public function __construct(protected ?Post $post = null, public array $relationships = [])
    {
        if ($this->post !== null) {
            $this->fillPayload();
        }
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return route('v1.api.posts.store');
    }

    /**
     * Fill the payload of the request based on the given post.
     *
     * @return static
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
                    'published_at'
                ]
            ),
            static fn ($value) => $value !== null
        );

        return $this;
    }

    /**
    * Retrieve type resource.
    *
    * @return string
    */
    public function type(): string
    {
        return 'posts';
    }
}
