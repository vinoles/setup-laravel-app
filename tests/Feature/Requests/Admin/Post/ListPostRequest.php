<?php

namespace Tests\Feature\Requests\Admin\Post;

use Tests\Feature\Requests\GetRequest;

class ListPostRequest extends GetRequest
{
    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.post.index');
    }
}
