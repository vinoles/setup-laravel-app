<?php

namespace App\ApiDoc\Post;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/posts",
 *     operationId="createPost",
 *     tags={"Posts"},
 *     summary="Create post",
 *     description="Create endpoint for post",
 *     security={ {"sanctum": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/PostCreateRequest"),
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
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Bad Request",
 *         @OA\JsonContent()
 *     ),
 * )
 *
 */
class CreatePost extends ApiDoc
{
}
