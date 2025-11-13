<?php

namespace App\ApiDoc\League\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="LeagueAttributes",
 *     type="object",
 *
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Primera División"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         example="Spain"
 *     ),
 *     @OA\Property(
 *         property="sport_id",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         example="2025-04-15T12:00:00Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         example="2025-04-16T08:30:00Z"
 *     )
 * )
 */
class LeagueAttributes {}
