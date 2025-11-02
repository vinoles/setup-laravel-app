<?php

namespace Tests\Feature\Requests;

abstract class PutRequest extends Request
{
    /**
     * Retrieve the method of the request.
     *
     * @return string
     */
    public function method(): string
    {
        return 'put';
    }
}
