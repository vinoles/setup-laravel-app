<?php

namespace App\ApiDoc\Comment;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/comments",
 *     operationId="createComment",
 *     tags={"Comments"},
 *     summary="Create comment",
 *     description="Create endpoint for comment",
 *     security={ {"sanctum": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/CommentCreateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="201",
 *       description="CreateComment Successful",
 *         @OA\JsonContent(ref="#/components/schemas/CommentApiResponse"),
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
class CreateComment extends ApiDoc
{
}
