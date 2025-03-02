<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
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
 *             example="http://sever.example/api/v1/posts/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *         )
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             example="posts"
 *         ),
 *         @OA\Property(
 *             property="id",
 *             type="string",
 *             example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *         ),
 *         @OA\Property(
 *             property="attributes",
 *             ref="#/components/schemas/PostAttributes"
 *         ),
 *         @OA\Property(
 *             property="links",
 *             type="object",
 *             @OA\Property(
 *                 property="self",
 *                 type="string",
 *                 example="http://sever.example/api/v1/posts/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *             )
 *         )
 *     )
 * )
 */
class PostApiResponse
{
}
