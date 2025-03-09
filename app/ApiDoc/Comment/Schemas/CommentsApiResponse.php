<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     @OA\Property(
 *         property="meta",
 *         ref="#/components/schemas/PaginationMeta"
 *     ),
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
 *             example="http://sever.example/api/v1/comments?page%5Bnumber%5D=1&page%5Bsize%5D=10&sort=-createdAt"
 *         ),
 *         @OA\Property(
 *             property="last",
 *             type="string",
 *             example="http://sever.example/api/v1/comments?page%5Bnumber%5D=4&page%5Bsize%5D=10&sort=-createdAt"
 *         ),
 *         @OA\Property(
 *             property="next",
 *             type="string",
 *             example="http://sever.example/api/v1/comments?page%5Bnumber%5D=2&page%5Bsize%5D=10&sort=-createdAt"
 *         )
 *     ),
 *     @OA\Property(
 *          property="data",
 *          type="array",
 *          @OA\Items(
 *              ref="#/components/schemas/CommentApiResource",
 *          ),
 *     )
 * )
 */
class CommentsApiResponse
{
}
