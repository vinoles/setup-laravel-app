<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *     ),
 *     @OA\Property(
 *         property="content",
 *         type="string",
 *         example="the content application test comment example"
 *     ),
 * )
 */
class CommentAttributes
{
}
