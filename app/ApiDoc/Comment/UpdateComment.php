<?php

namespace App\ApiDoc\Comment;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Patch(
 *     path="/api/v1/comments/{comment}",
 *     operationId="updateComment",
 *     tags={"Comments"},
 *     summary="Update comment",
 *     description="Update endpoint for comment",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="comment",
 *         in="path",
 *         description="ID of comment (UUID)",
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
 *             @OA\Schema(ref="#/components/schemas/CommentUpdateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="200",
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
class UpdateComment extends ApiDoc
{
}
