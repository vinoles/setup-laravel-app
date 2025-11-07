<?php

namespace Tests\Feature\Requests\Admin\Club;

use Tests\Feature\Requests\GetRequest;

class ShowClubRequest extends GetRequest
{
    public function __construct(protected int $clubId)
    {
    }

    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.clubs.show', ['id' => $this->clubId]);
    }
}

