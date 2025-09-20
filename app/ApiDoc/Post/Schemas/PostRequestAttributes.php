<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostRequestAttributes",
 *     type="object",
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         example="Application post example"
 *     ),
 *     @OA\Property(
 *         property="content",
 *         type="string",
 *         example="the content application test post example"
 *     )
 * )
 */
class PostRequestAttributes
{
}
