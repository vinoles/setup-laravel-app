<?php

namespace App\Http\Controllers\Api\V1\Post\Actions;

use App\Helpers\ApiResponseHelper;
use App\Jobs\Posts\DeletePost;
use App\Models\Post;
use Illuminate\Http\Response;

trait Destroy
{
    /**
     * Destroy an existing resource.
     *
     * @return \Illuminate\Contracts\Support\Responsable|\Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
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

