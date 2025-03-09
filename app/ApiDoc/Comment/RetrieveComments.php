<?php

namespace App\ApiDoc\Comment;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/comments",
 *     operationId="retrieveComments",
 *     tags={"Comments"},
 *     summary="List comments",
 *     description="List comments endpoint",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="page[number]",
 *         required=true,
 *         in="query",
 *         @OA\Schema(
 *             type="integer",
 *             default=1
 *         ),
 *         description="Number page for pagination"
 *     ),
 *     @OA\Parameter(
 *         name="page[size]",
 *         required=true,
 *         in="query",
 *         @OA\Schema(
 *             type="integer",
 *             default=10
 *         ),
 *         description="Number of elements for page"
 *     ),
 *     @OA\Parameter(
 *         name="include",
 *         in="query",
 *         @OA\Schema(
 *              type="string",
 *              default="post,user"
 *         ),
 *         description="Include relations ships information, ?include=post"
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve Comments Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/CommentsApiResponse"),
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
class RetrieveComments extends ApiDoc
{
}
