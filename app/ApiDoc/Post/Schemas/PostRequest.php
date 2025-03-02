<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostRequest",
 *     type="object",
 *     required={"email", "first_name", "last_name", "phone", "address", "city", "country", "birthdate", "role", "password"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="posts"
 *     ),
 *     @OA\Property(
 *         property="attributes",
 *         type="object",
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="Post email address",
 *         example="Post@example.com"
 *     ),
 *     @OA\Property(
 *         property="first_name",
 *         type="string",
 *         maxLength=50,
 *         description="First name of the Post",
 *         example="John"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         maxLength=50,
 *         description="Last name of the Post",
 *         example="Doe"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         minLength=10,
 *         maxLength=20,
 *         description="Phone number of the Post",
 *         example="123-456-7890"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         maxLength=150,
 *         description="Address of the Post",
 *         example="123 Main St, Anytown"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         maxLength=100,
 *         description="City of the Post",
 *         example="Anytown"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         maxLength=100,
 *         description="Country of the Post",
 *         example="USA"
 *     ),
 *     @OA\Property(
 *         property="postal_code",
 *         type="string",
 *         maxLength=25,
 *         nullable=true,
 *         description="Postal code of the Post",
 *         example="12345"
 *     ),
 *     @OA\Property(
 *         property="birthdate",
 *         type="string",
 *         format="date",
 *         description="Birthdate of the Post",
 *         example="2000-01-01"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         format="password",
 *         description="Password for the Post account",
 *         example="strongPassword123"
 *     ),
 *     @OA\Property(
 *         property="password_confirmation",
 *         type="string",
 *         format="password",
 *         description="Confirm password for the Post account",
 *         example="strongPassword123"
 *     )
 * )
 * )
 * )
 */
class PostRequest
{
}
