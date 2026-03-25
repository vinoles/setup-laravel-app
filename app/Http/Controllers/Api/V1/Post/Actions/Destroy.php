<?php

namespace App\Http\Controllers\Api\V1\Post\Actions;

use App\Helpers\ApiResponseHelper;
use App\Jobs\Posts\DeletePost;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\JsonApi\V1\Posts\PostSchema;
use App\Models\Post;
use Illuminate\Http\Response;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

trait Destroy
{
    use ResolvesJsonApiServer;

    /**
     * Destroy an existing resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function destroy(Post $post, ResourceRequest $request)
    {
        $server = $this->resolveServer();
        $schema = new PostSchema($server);
        $schema->delete($post, $request);

        $uuId = $post->uuid;

        DeletePost::dispatch($post);

        return ApiResponseHelper::jsonApiResponse(
            [
                'id'       => $uuId,
                'deleting' => true,
            ],
            Response::HTTP_OK
        );
    }
}
