<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Club de Fútbol Barcelona"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         example="Carrer d'Aristides Maillol, 12, 08028 Barcelona, España"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         example="2023-01-15T10:30:00Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         example="2023-01-15T10:30:00Z"
 *     )
 * )
 */
class ClubAttributes
{
}