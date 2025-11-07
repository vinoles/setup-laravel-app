<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamAttributes",
 *     type="object",
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
 *         property="club",
 *         type="object",
 *         nullable=true,
 *         @OA\Property(
 *             property="id",
 *             type="string",
 *             format="uuid",
 *             example="a8c1fdb7-8c1e-4c1a-8d0a-0c1fdb7a8c1f"
 *         ),
 *         @OA\Property(
 *             property="name",
 *             type="string",
 *             example="Club Deportivo Weetals"
 *         ),
 *         @OA\Property(
 *             property="address",
 *             type="string",
 *             example="Av. Principal 123, Valencia"
 *         )
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
class TeamAttributes
{
}
