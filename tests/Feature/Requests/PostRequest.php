<?php

namespace Tests\Feature\Requests;

abstract class PostRequest extends Request
{
    /**
     * Retrieve the method of the request.
     */
    public function method(): string
    {
        return 'post';
    }
}
