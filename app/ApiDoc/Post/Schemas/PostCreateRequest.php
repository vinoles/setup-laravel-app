<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostCreateRequest",
 *     type="object",
 *     required={"content", "slug", "title"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *              property="type",
 *              type="string",
 *              example="posts"
 *          ),
 *          @OA\Property(
 *              property="attributes",
 *              type="object",
 *              ref="#/components/schemas/PostRequestAttributes",
 *      ),
 *   ),
 * )
 */
class PostCreateRequest
{
}
