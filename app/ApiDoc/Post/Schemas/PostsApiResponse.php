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
 *             property="first",
 *             type="string",
 *             example="http://sever.example/api/v1/posts?page%5Bnumber%5D=1&page%5Bsize%5D=10&sort=-createdAt"
 *         ),
 *         @OA\Property(
 *             property="last",
 *             type="string",
 *             example="http://sever.example/api/v1/posts?page%5Bnumber%5D=4&page%5Bsize%5D=10&sort=-createdAt"
 *         ),
 *         @OA\Property(
 *             property="next",
 *             type="string",
 *             example="http://sever.example/api/v1/posts?page%5Bnumber%5D=2&page%5Bsize%5D=10&sort=-createdAt"
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
 *             type="array",
 *             @OA\Items(
 *                 ref="#/components/schemas/PostAttributes",
 *             ),
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
class PostsApiResponse
{
}
