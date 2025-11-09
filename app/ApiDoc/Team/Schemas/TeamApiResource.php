<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamApiResource",
 *     type="object",
 *
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="teams"
 *     ),
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="2b6a4bfa-4d90-4f64-8d39-2d8948d0e888"
 *     ),
 *     @OA\Property(
 *         property="attributes",
 *         ref="#/components/schemas/TeamAttributes"
 *     ),
 *     @OA\Property(
 *         property="relationships",
 *         ref="#/components/schemas/TeamRelationships"
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/teams/2b6a4bfa-4d90-4f64-8d39-2d8948d0e888"
 *         )
 *     )
 * )
 */
class TeamApiResource {}
