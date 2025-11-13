<?php

namespace App\Http\Controllers\Api\V1\Club\Actions;

use App\Helpers\ApiResponseHelper;
use App\Jobs\Clubs\UpdateClub;
use App\JsonApi\V1\Clubs\ClubRequest;
use App\Models\Club;
use Illuminate\Http\Response;

trait Update
{
    /**
     * Update an existing resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function update(ClubRequest $request, Club $club)
    {
        $attributes = $request->validated();

        UpdateClub::dispatch($club, $attributes);

        return ApiResponseHelper::jsonApiResponse(
            [
                'id'       => $club->uuid,
                'updating' => true,
            ],
            Response::HTTP_OK
        );
    }
}
