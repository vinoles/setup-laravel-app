<?php

namespace Tests\Feature\Requests\Admin\Post;

use App\Models\Post;
use Tests\Feature\Requests\DeleteRequest;

class DeletePostRequest extends DeleteRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  Post|int  $postOrId
     */
    public function __construct(protected Post|int $postOrId)
    {
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        $id = $this->postOrId instanceof Post ? $this->postOrId->id : $this->postOrId;

        return route('admin.posts.destroy', ['id' => $id]);
    }
}
