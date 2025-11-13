<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamCreateRequest",
 *     type="object",
 *     required={"data"},
 *
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         required={"type","attributes"},
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             example="teams"
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
class TeamCreateRequest {}
