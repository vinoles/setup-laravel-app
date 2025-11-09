<?php

namespace App\JsonApi\V1\Comments;

use App\Models\Comment;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

/**
 * @property Comment
 */
class CommentResource extends JsonApiResource
{
    /**
     * Get the resource's attributes.
     *
     * @param  Request|null  $request
     */
    public function attributes($request): iterable
    {
        return [
            'content' => $this->content,
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

    public function metaForDelete(Comment $post): array
    {
        return [];
    }
}
