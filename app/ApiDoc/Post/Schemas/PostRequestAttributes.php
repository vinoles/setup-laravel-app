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
 *     ),
 *     @OA\Property(
 *         property="publishedAt",
 *         type="date",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 * )
 */
class PostRequestAttributes
{
}
