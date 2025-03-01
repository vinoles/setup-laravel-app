<?php

namespace App\JsonApi\V1\Comments;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class CommentRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
            'post_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ];
    }
}
