<?php

namespace App\ApiDoc\Federation\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FederationAttributes",
 *     type="object",
 *
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="International Basketball Federation"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="Basketball"
 *     ),
 *     @OA\Property(
 *         property="acronym",
 *         type="string",
 *         example="FIBA"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         example="Switzerland"
 *     ),
 *     @OA\Property(
 *         property="foundation_year",
 *         type="integer",
 *         example=1932
 *     ),
 *     @OA\Property(
 *         property="website",
 *         type="string",
 *         example="https://www.fiba.basketball"
 *     ),
 *     @OA\Property(
 *         property="contact_email",
 *         type="string",
 *         example="info@fiba.basketball"
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
class FederationAttributes {}
