<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamsApiResponse",
 *    type="object",
 *     @OA\Property(
 *         property="meta",
 *         ref="#/components/schemas/PaginationMeta"
 *     ),
 *     @OA\Property(
 *         property="jsonapi",
 *         ref="#/components/schemas/VersionMeta"
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="first",
 *             type="string",
 *             example="http://server.example/api/v1/teams?page%5Bnumber%5D=1&page%5Bsize%5D=10"
 *         ),
 *         @OA\Property(
 *             property="last",
 *             type="string",
 *             example="http://server.example/api/v1/teams?page%5Bnumber%5D=4&page%5Bsize%5D=10"
 *         ),
 *         @OA\Property(
 *             property="next",
 *             type="string",
 *             example="http://server.example/api/v1/teams?page%5Bnumber%5D=2&page%5Bsize%5D=10"
 *         )
 *     ),
 *     @OA\Property(
 *        property="data",
 *        type="array",
 *        @OA\Items(ref="#/components/schemas/TeamApiResource")
 *     )
 * )
 */
class TeamsApiResponse
{
}
