<?php

namespace App\ApiDoc\League\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="LeagueApiResource",
 *     type="object",
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="leagues"
 *     ),
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c"
 *     ),
 *     @OA\Property(
 *         property="attributes",
 *         ref="#/components/schemas/LeagueAttributes"
 *     ),
 *     @OA\Property(
 *         property="relationships",
 *         ref="#/components/schemas/LeagueRelationships"
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/leagues/5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c"
 *         )
 *     )
 * )
 */
class LeagueApiResource
{
}
