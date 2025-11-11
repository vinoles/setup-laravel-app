<?php

namespace App\Http\Controllers\Api\V1\Club\Helpers;

use App\Helpers\ApiResponseHelper;
use App\Jobs\Clubs\CreateClub;
use App\JsonApi\V1\Clubs\ClubRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

trait Store
{
    /**
     * Create a new resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function store(ClubRequest $request)
    {
        $attributes = $request->validated();
        $uuid = Str::uuid()->toString();
        $attributes['uuid'] = $uuid;

        CreateClub::dispatch($attributes);

        return ApiResponseHelper::jsonApiResponse(
            [
                'id'       => $uuid,
                'creating' => true,
            ],
            Response::HTTP_CREATED
        );
    }
}
