<?php

namespace Tests\Feature\Requests;

abstract class GetRequest extends Request
{
    /**
     * Retrieve the method of the request.
     *
     * @return string
     */
    public function method(): string
    {
        return 'get';
    }
}
