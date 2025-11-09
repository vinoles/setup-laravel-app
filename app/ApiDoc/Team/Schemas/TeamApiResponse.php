<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamApiResponse",
 *     type="object",
 *
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
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/teams/2b6a4bfa-4d90-4f64-8d39-2d8948d0e888"
 *         )
 *     ),
 *     @OA\Property(
 *         property="data",
 *         ref="#/components/schemas/TeamApiResource"
 *     )
 * )
 */
class TeamApiResponse {}
