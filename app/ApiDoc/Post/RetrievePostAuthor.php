<?php

namespace App\ApiDoc\Post;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/posts/{post}/author",
 *     operationId="retrievePostAuthor",
 *     tags={"Posts"},
 *     summary="Show post author information",
 *     description="Show post author endpoint",
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
 *       response="200",
 *       description="Retrieve Post Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/UserApiResponse"),
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
class RetrievePostAuthor extends ApiDoc
{
}
