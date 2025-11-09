<?php

namespace App\ApiDoc\Player\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PlayerRequestAttributes",
 *     type="object",
 *     @OA\Property(
 *         property="first_name",
 *         type="string",
 *         example="Lionel",
 *         description="First name of the player (required, max 80 characters)"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         example="Messi",
 *         description="Last name of the player (required, max 80 characters)"
 *     ),
 *     @OA\Property(
 *         property="birthdate",
 *         type="string",
 *         format="date",
 *         example="1987-06-24",
 *         description="Birthdate of the player (optional)"
 *     ),
 *     @OA\Property(
 *         property="nationality",
 *         type="string",
 *         example="Argentina",
 *         description="Nationality of the player (optional, max 80 characters)"
 *     ),
 *     @OA\Property(
 *         property="position",
 *         type="string",
 *         example="Forward",
 *         description="Position of the player (optional, max 40 characters)"
 *     ),
 *     @OA\Property(
 *         property="height_cm",
 *         type="integer",
 *         example=170,
 *         description="Height in centimeters (optional)"
 *     ),
 *     @OA\Property(
 *         property="weight_kg",
 *         type="integer",
 *         example=72,
 *         description="Weight in kilograms (optional)"
 *     )
 * )
 */
class PlayerRequestAttributes
{
}
