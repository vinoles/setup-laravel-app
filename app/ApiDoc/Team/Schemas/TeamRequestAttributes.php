<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamRequestAttributes",
 *     type="object",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Weetals FC",
 *         description="Team name (required, max 120 characters)"
 *     ),
 *     @OA\Property(
 *         property="short_name",
 *         type="string",
 *         example="WFC",
 *         description="Optional short alias (max 20 characters)"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         example="Valencia",
 *         description="City where the team is based (optional, max 80 characters)"
 *     ),
 *     @OA\Property(
 *         property="logo_path",
 *         type="string",
 *         example="https://cdn.example.com/logos/weetals-fc.svg",
 *         description="Optional logo URL (max 255 characters)"
 *     )
 * )
 */
class TeamRequestAttributes
{
}
