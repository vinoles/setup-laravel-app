<?php

namespace App\ApiDoc\Player\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *
 *     @OA\Property(
 *         property="first_name",
 *         type="string",
 *         example="Lionel"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         example="Messi"
 *     ),
 *     @OA\Property(
 *         property="birthdate",
 *         type="string",
 *         format="date",
 *         example="1987-06-24"
 *     ),
 *     @OA\Property(
 *         property="nationality",
 *         type="string",
 *         example="Argentina"
 *     ),
 *     @OA\Property(
 *         property="position",
 *         type="string",
 *         example="Forward"
 *     ),
 *     @OA\Property(
 *         property="height_cm",
 *         type="integer",
 *         example=170
 *     ),
 *     @OA\Property(
 *         property="weight_kg",
 *         type="integer",
 *         example=72
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         example="2025-03-02T13:25:39.000000Z"
 *     ),
 * )
 */
class PlayerAttributes {}
