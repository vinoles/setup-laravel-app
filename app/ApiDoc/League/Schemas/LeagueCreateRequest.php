<?php

namespace App\ApiDoc\League\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="LeagueCreateRequest",
 *     type="object",
 *     required={"data"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         required={"type","attributes","relationships"},
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             example="leagues"
 *         ),
 *         @OA\Property(
 *             property="attributes",
 *             ref="#/components/schemas/LeagueRequestAttributes"
 *         ),
 *         @OA\Property(
 *             property="relationships",
 *             ref="#/components/schemas/LeagueFederationRequestRelationship"
 *         )
 *     )
 * )
 */
class LeagueCreateRequest
{
}
