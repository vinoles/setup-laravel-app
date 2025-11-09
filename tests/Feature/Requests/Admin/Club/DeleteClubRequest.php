<?php

namespace Tests\Feature\Requests\Admin\Club;

use Tests\Feature\Requests\DeleteRequest;

class DeleteClubRequest extends DeleteRequest
{
    /**
     * Create a new instance of the request.
     */
    public function __construct(protected int $clubId) {}

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.clubs.destroy', ['id' => $this->clubId]);
    }
}
