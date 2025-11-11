<?php

namespace App\Http\Controllers\Api\V1\Club\Helpers;

use App\Helpers\ApiResponseHelper;
use App\Jobs\Clubs\DeleteClub;
use App\Models\Club;
use Illuminate\Http\Response;

trait Destroy
{
    /**
     * Destroy an existing resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        DeleteClub::dispatch($club);

        return ApiResponseHelper::jsonApiResponse(
            [
                'id'       => $club->uuid,
                'deleting' => true,
            ],
            Response::HTTP_OK
        );
    }
}
