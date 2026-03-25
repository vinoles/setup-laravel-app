<?php

namespace Tests\Feature\Requests;

abstract class PatchRequest extends Request
{
    /**
     * Retrieve the method of the request.
     */
    public function method(): string
    {
        return 'patch';
    }
}
