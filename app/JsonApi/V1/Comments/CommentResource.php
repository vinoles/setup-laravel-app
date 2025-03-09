<?php

namespace App\JsonApi\V1\Comments;

use App\Models\Comment;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Comment $resource
 */
class CommentResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function attributes($request): iterable
    {
        return [
            'id' => $this->uuid,
            'content' => $this->content,
        ];
    }

    /**
     * @return array
     */
    public function deleteRules(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function deleteMessages(): array
    {
        return [];
    }

    /**
     * @param Comment $post
     * @return array
     */
    public function metaForDelete(Comment $post): array
    {
        return [];
    }
}
