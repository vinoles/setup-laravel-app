<?php

namespace App\ApiDoc\Post;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Delete(
 *     path="/api/v1/posts/{post}",
 *     operationId="deletePost",
 *     tags={"Posts"},
 *     summary="Delete post",
 *     description="Delete post endpoint",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="ID of post (UUID)",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             default="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *         )
 *     ),
 *     @OA\Response(
 *       response="204",
 *       description="Delete Post Successfully",
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Not found error",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal Server Error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class DeletePost extends ApiDoc
{
}
