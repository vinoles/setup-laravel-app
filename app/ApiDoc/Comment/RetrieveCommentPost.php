<?php

namespace App\ApiDoc\Comment;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/comments/{comment}/post",
 *     operationId="retrieveCommentPost",
 *     tags={"Comments"},
 *     summary="Show comment post information",
 *     description="Show comment post endpoint",
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
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve Comment Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/PostApiResponse"),
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
class RetrieveCommentPost extends ApiDoc
{
}
