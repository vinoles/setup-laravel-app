<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostUpdateRequest",
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
 *         @OA\Property(
 *              property="id",
 *              type="string",
 *              example="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *          ),
 *          @OA\Property(
 *              property="attributes",
 *              type="object",
 *              @OA\Property(
 *              property="title",
 *              type="string",
 *              example="Application post example"
 *          ),
 *          @OA\Property(
 *              property="slug",
 *              type="string",
 *              example="application-test-post-example"
 *          ),
 *          @OA\Property(
 *              property="content",
 *              type="string",
 *              example="the content application test post example"
 *          ),
 *          @OA\Property(
 *              property="publishedAt",
 *              type="date",
 *              example="2025-03-02T13:25:39.000000Z"
 *          ),
 *      ),
 *   ),
 * )
 */
class PostUpdateRequest
{
}
