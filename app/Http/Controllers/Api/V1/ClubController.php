<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Jobs\Clubs\CreateClub;
use App\Jobs\Clubs\UpdateClub;
use App\JsonApi\V1\Clubs\ClubRequest;
use App\JsonApi\V1\Clubs\ClubSchema;
use App\Models\Club;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use LaravelJsonApi\Core\Document\Concerns\Serializable;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\AttachRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\Destroy;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\DetachRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchMany;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchOne;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchRelated;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\Update;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\UpdateRelationship;
use LaravelJsonApi\Laravel\Http\Requests\AnonymousQuery;

class ClubController extends Controller
{
    use AttachRelationship;
    use Destroy;
    use DetachRelationship;
    use FetchMany;
    use FetchOne;
    use FetchRelated;
    use FetchRelationship;
    use Serializable;
    // use Update;
    use UpdateRelationship;

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function store(ClubSchema $schema, ClubRequest $request, AnonymousQuery $query)
    {
        $attributes = $request->validated();

        $uuid = Str::uuid()->toString();

        $attributes['uuid'] = $uuid;

        CreateClub::dispatch($attributes);

        return ApiResponseHelper::jsonApiResponse([
            'id'       => $uuid,
            'creating' => true,
        ], Response::HTTP_CREATED);
    }

    /**
     * Update an existing resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function update(
        ClubSchema $schema,
        ClubRequest $request,
        AnonymousQuery $query,
        Club $club
    ) {
        $attributes = $request->validated();

        UpdateClub::dispatch($club, $attributes, $schema);

        return ApiResponseHelper::jsonApiResponse([
            'id'       => $club->uuid,
            'updating' => true,
        ], Response::HTTP_CREATED);
    }
}
