<?php

namespace App\Http\Controllers\Api\V1\Club\Actions;

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
        $uuId = $club->uuid;

        DeleteClub::dispatch($club);

        return ApiResponseHelper::jsonApiResponse(
            [
                'id'       => $uuId,
                'deleting' => true,
            ],
            Response::HTTP_OK
        );
    }
}
