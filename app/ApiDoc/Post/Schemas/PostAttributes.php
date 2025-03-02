<?php

namespace App\ApiDoc\Post\Schemas;

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
 *         property="title",
 *         type="string",
 *         example="Dogme post example"
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         example="dogme-post-example"
 *     ),
 *     @OA\Property(
 *         property="content",
 *         type="string",
 *         example="the content dogme post example"
 *     ),
 *     @OA\Property(
 *         property="published_at",
 *         type="date",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 * )
 */
class PostAttributes
{
}
