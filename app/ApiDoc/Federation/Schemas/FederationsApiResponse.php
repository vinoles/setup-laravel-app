<?php

namespace App\ApiDoc\Federation\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FederationsApiResponse",
 *     type="object",
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
 *             example="http://server.example/api/v1/federations?page%5Bnumber%5D=1&page%5Bsize%5D=10"
 *         ),
 *         @OA\Property(
 *             property="last",
 *             type="string",
 *             example="http://server.example/api/v1/federations?page%5Bnumber%5D=4&page%5Bsize%5D=10"
 *         ),
 *         @OA\Property(
 *             property="next",
 *             type="string",
 *             example="http://server.example/api/v1/federations?page%5Bnumber%5D=2&page%5Bsize%5D=10"
 *         )
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/FederationApiResource")
 *     )
 * )
 */
class FederationsApiResponse
{
}
