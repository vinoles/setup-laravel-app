<?php

namespace Tests\Feature\Requests\Admin\Club;

use Tests\Feature\Requests\GetRequest;

class ListClubRequest extends GetRequest
{
    /**
     * Retrieve the endpoint of the request.
     */
    public function endpoint(): string
    {
        return route('admin.clubs.index');
    }
}
