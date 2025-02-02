<?php

namespace Tests\Feature\Requests;

abstract class PostRequest extends Request
{
    /**
     * Retrieve the method of the request.
     *
     * @return string
     */
    public function method(): string
    {
        return 'post';
    }
}
