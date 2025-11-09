<?php

namespace App\ApiDoc\League\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="LeagueUpdateRequest",
 *     type="object",
 *     required={"data"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         required={"type","id"},
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             example="leagues"
 *         ),
 *         @OA\Property(
 *             property="id",
 *             type="string",
 *             format="uuid",
 *             example="5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c"
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
class LeagueUpdateRequest
{
}
