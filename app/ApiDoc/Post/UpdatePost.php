<?php

namespace App\ApiDoc\Post;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Patch(
 *     path="/api/v1/posts/{post}",
 *     operationId="updatePost",
 *     tags={"Posts"},
 *     summary="Update post",
 *     description="Update endpoint for post",
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
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/PostUpdateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="CreatePost Successful",
 *         @OA\JsonContent(ref="#/components/schemas/PostApiResponse"),
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(ref="#/components/schemas/UnprocessableEntityError"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal Server Error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class UpdatePost extends ApiDoc
{
}
