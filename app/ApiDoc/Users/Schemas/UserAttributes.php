<?php

namespace App\ApiDoc\Users\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *     ),
 *     @OA\Property(
 *         property="first_name",
 *         type="string",
 *         example="Dogme"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         example="Test"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="419-485-0292"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         example="27369 Bettie Lock Suite 220"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         example="Port Candidostad"
 *     ),
 *     @OA\Property(
 *         property="province",
 *         type="string",
 *         nullable=true,
 *         example=null
 *     ),
 *     @OA\Property(
 *         property="birthdate",
 *         type="string",
 *         format="date-time",
 *         example="2007-07-17T00:00:00.000000Z"
 *     )
 * )
 */
class UserAttributes
{
}
