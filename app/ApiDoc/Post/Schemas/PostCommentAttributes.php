<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostCommentAttributes",
 *     type="object",
 *
 *     @OA\Property(
 *         property="content",
 *         type="string",
 *         example="the content application test post example"
 *     ),
 *     @OA\Property(
 *         property="createdAt",
 *         type="date",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updatedAt",
 *         type="date",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 * )
 */
class PostCommentAttributes {}
