<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubTeamAttributes",
 *     type="object",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Granada FC"
 *     ),
 *     @OA\Property(
 *         property="short_name",
 *         type="string",
 *         example="GFC"
 *     ),
 *     @OA\Property(
 *         property="createdAt",
 *         type="date",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updatedAt",
 *         type="date",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 * )
 */
class ClubTeamAttributes
{
}
