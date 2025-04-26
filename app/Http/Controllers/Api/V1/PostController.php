<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Jobs\Posts\CreatePost;
use App\JsonApi\V1\Posts\PostRequest;
use App\JsonApi\V1\Posts\PostSchema;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use LaravelJsonApi\Core\Document\Concerns\Serializable;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;
use LaravelJsonApi\Laravel\Http\Requests\AnonymousQuery;

class PostController extends Controller
{

    use Actions\FetchMany;
    use Actions\FetchOne;
    use Actions\Update;
    use Actions\Destroy;
    use Actions\FetchRelated;
    use Actions\FetchRelationship;
    use Actions\UpdateRelationship;
    use Actions\AttachRelationship;
    use Actions\DetachRelationship;
    use Serializable;

    /**
     * Create a new resource.
     *
     * @param PostSchema $schema
     * @param PostRequest $request
     * @param AnonymousQuery $query
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function store(PostSchema $schema, PostRequest $request, AnonymousQuery $query)
    {
        $attributes = $request->validated();

        $uuid = Str::uuid()->toString();

        $attributes['uuid'] = $uuid;

        CreatePost::dispatch($attributes);

        return response()->json([
            'jsonapi' => [
                'version' => '1.0'
            ],
            'data' => [
                'id' => $uuid,
                'creating' => true,
            ]
        ], Response::HTTP_CREATED);
    }
}
