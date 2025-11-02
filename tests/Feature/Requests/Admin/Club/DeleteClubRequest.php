<?php

namespace Tests\Feature\Requests\Admin\Club;

use App\Models\Club;
use Tests\Feature\Requests\DeleteRequest;

class DeleteClubRequest extends DeleteRequest
{
    /**
     * Create a new instance of the request.
     *
     * @param  Club|int  $clubOrId
     */
    public function __construct(protected Club|int $clubOrId)
    {
    }

    /**
     * Retrieve the endpoint of the request.
     *
     * @return string
     */
    public function endpoint(): string
    {
        $id = $this->clubOrId instanceof Club ? $this->clubOrId->id : $this->clubOrId;

        return route('admin.clubs.destroy', ['id' => $id]);
    }
}

