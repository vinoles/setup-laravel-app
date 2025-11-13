<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Jobs\Posts\CreatePost;
use App\JsonApi\V1\Posts\PostRequest;
use App\JsonApi\V1\Posts\PostSchema;
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

class PostController extends Controller
{
    use AttachRelationship;
    use Destroy;
    use DetachRelationship;
    use FetchMany;
    use FetchOne;
    use FetchRelated;
    use FetchRelationship;
    use Serializable;
    use Update;
    use UpdateRelationship;

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function store(PostSchema $schema, PostRequest $request, AnonymousQuery $query)
    {
        $attributes = $request->validated();

        $uuid = Str::uuid()->toString();

        $attributes['uuid'] = $uuid;

        CreatePost::dispatch($attributes);

        return ApiResponseHelper::jsonApiResponse([
            'id'       => $uuid,
            'creating' => true,
        ], Response::HTTP_CREATED);
    }
}
