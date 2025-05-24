<?php

namespace App\ApiDoc\User\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="UserRequest",
 *     type="object",
 *     required={"email", "first_name", "last_name", "phone", "address", "city", "country", "birthdate", "role", "password"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="users"
 *     ),
 *     @OA\Property(
 *         property="attributes",
 *         type="object",
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="User email address",
 *         example="user@example.com"
 *     ),
 *     @OA\Property(
 *         property="first_name",
 *         type="string",
 *         maxLength=50,
 *         description="First name of the user",
 *         example="John"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         maxLength=50,
 *         description="Last name of the user",
 *         example="Doe"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         minLength=10,
 *         maxLength=20,
 *         description="Phone number of the user",
 *         example="123-456-7890"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         maxLength=150,
 *         description="Address of the user",
 *         example="123 Main St, Anytown"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         maxLength=100,
 *         description="City of the user",
 *         example="Anytown"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         maxLength=100,
 *         description="Country of the user",
 *         example="USA"
 *     ),
 *     @OA\Property(
 *         property="postal_code",
 *         type="string",
 *         maxLength=25,
 *         nullable=true,
 *         description="Postal code of the user",
 *         example="12345"
 *     ),
 *     @OA\Property(
 *         property="birthdate",
 *         type="string",
 *         format="date",
 *         description="Birthdate of the user",
 *         example="2000-01-01"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         format="password",
 *         description="Password for the user account",
 *         example="strongPassword123"
 *     ),
 *     @OA\Property(
 *         property="password_confirmation",
 *         type="string",
 *         format="password",
 *         description="Confirm password for the user account",
 *         example="strongPassword123"
 *     ),
 *     @OA\Property(
 *         property="roles",
 *         type="array",
 *         description="Role of the user",
 *         @OA\Items(type="integer"),
 *         example={"Admin"}
 *     ),
 * )
 * )
 * )
 */
class UserRequest
{
}
