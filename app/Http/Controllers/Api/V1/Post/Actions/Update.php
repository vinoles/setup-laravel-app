<?php

namespace App\Http\Controllers\Api\V1\Post\Actions;

use App\Helpers\ApiResponseHelper;
use App\Jobs\Posts\UpdatePost;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\JsonApi\V1\Posts\PostRequest;
use App\JsonApi\V1\Posts\PostSchema;
use App\Models\Post;
use Illuminate\Http\Response;

trait Update
{
    use ResolvesJsonApiServer;

    /**
     * Update an existing resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $server = $this->resolveServer();
        $schema = new PostSchema($server);
        $schema->update($post, $request);

        $attributes = $request->validated();

        UpdatePost::dispatch($post, $attributes);

        return ApiResponseHelper::jsonApiResponse(
            [
                'id'       => $post->uuid,
                'updating' => true,
            ],
            Response::HTTP_OK
        );
    }
}

