<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamAttributes",
 *     type="object",
 *
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Weetals FC"
 *     ),
 *     @OA\Property(
 *         property="short_name",
 *         type="string",
 *         example="WFC"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         example="Valencia"
 *     ),
 *     @OA\Property(
 *         property="logo_path",
 *         type="string",
 *         example="https://cdn.example.com/logos/weetals-fc.svg"
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
class TeamAttributes {}
