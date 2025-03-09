<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CommentApiResponse",
 *     type="object",
 *     @OA\Property(
 *         property="jsonapi",
 *         type="object",
 *         @OA\Property(
 *             property="version",
 *             type="string",
 *             example="1.0"
 *         )
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/comments/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *         )
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/CommentApiResource",
 *     )
 * )
 */
class CommentApiResponse
{
}
