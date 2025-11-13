<?php

namespace App\ApiDoc\League\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="LeagueRequestAttributes",
 *     type="object",
 *
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Primera División",
 *         description="League name (required, max 150 characters)"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         example="Spain",
 *         description="Country where the league operates (optional, max 80 characters)"
 *     ),
 *     @OA\Property(
 *         property="sport_id",
 *         type="integer",
 *         example=1,
 *         description="Optional sport identifier"
 *     )
 * )
 */
class LeagueRequestAttributes {}
