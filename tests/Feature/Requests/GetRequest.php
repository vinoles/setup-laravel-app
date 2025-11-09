<?php

namespace Tests\Feature\Requests;

abstract class GetRequest extends Request
{
    /**
     * Retrieve the method of the request.
     */
    public function method(): string
    {
        return 'get';
    }
}
