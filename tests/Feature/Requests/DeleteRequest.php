<?php

namespace Tests\Feature\Requests;

abstract class DeleteRequest extends Request
{
    /**
     * Retrieve the method of the request.
     */
    public function method(): string
    {
        return 'delete';
    }
}
