<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamUpdateRequest",
 *     type="object",
 *     required={"data"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         required={"type","id"},
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             example="teams"
 *         ),
 *         @OA\Property(
 *             property="id",
 *             type="string",
 *             format="uuid",
 *             example="2b6a4bfa-4d90-4f64-8d39-2d8948d0e888"
 *         ),
 *         @OA\Property(
 *             property="attributes",
 *             ref="#/components/schemas/TeamRequestAttributes"
 *         ),
 *         @OA\Property(
 *             property="relationships",
 *             ref="#/components/schemas/TeamClubRequestRelationship"
 *         )
 *     )
 * )
 */
class TeamUpdateRequest
{
}
