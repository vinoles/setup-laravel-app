<?php

namespace App\JsonApi\V1\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Post
 */
class PostResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param  Request|null  $request
     */
    public function attributes($request): iterable
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'published_at' => $this->published_at,
        ];
    }

    public function deleteRules(): array
    {
        return [];
    }

    public function deleteMessages(): array
    {
        return [];
    }

    public function metaForDelete(Post $post): array
    {
        return [];
    }
}
