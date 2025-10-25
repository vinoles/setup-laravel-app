<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubRequestAttributes",
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
 *     )
 * )
 */
class ClubRequestAttributes
{
}