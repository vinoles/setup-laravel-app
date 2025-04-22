<?php

namespace Tests\Feature\Requests\Api\Post;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\Feature\Requests\PostRequest;

class CreatePostRequest extends PostRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  Post|null  $post
     */
    public function __construct(protected ?Post $post = null)
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
                ]
            ),
            static fn ($value) => $value !== null
        );

        $password = Str::random(mt_rand(8, 31)).'!';

        $this->set('password', $password)
            ->set('password_confirmation', $password);


        $this->set('birthdate', $this->payload['birthdate']->format('Y-m-d'));


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
