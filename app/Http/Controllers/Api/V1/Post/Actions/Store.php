<?php

namespace App\Http\Controllers\Api\V1\Post\Actions;

use App\Helpers\ApiResponseHelper;
use App\Jobs\Posts\CreatePost;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\JsonApi\V1\Posts\PostRequest;
use App\JsonApi\V1\Posts\PostSchema;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

trait Store
{
    use ResolvesJsonApiServer;

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $server = $this->resolveServer();
        $schema = new PostSchema($server);
        $schema->create($request);

        $attributes = $request->validated();
        $uuid = Str::uuid()->toString();
        $attributes['uuid'] = $uuid;

        CreatePost::dispatch($attributes);

        return ApiResponseHelper::jsonApiResponse(
            [
                'id'       => $uuid,
                'creating' => true,
            ],
            Response::HTTP_CREATED
        );
    }
}
