<?php

namespace App\ApiDoc\Federation\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FederationRequestAttributes",
 *     type="object",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="International Basketball Federation",
 *         description="Federation name (required, max 150 characters)"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="Basketball",
 *         description="Optional sport or governing type (max 60 characters)"
 *     ),
 *     @OA\Property(
 *         property="acronym",
 *         type="string",
 *         example="FIBA",
 *         description="Optional acronym (max 20 characters)"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         example="Switzerland",
 *         description="Country where the federation is located (max 80 characters)"
 *     ),
 *     @OA\Property(
 *         property="foundation_year",
 *         type="integer",
 *         example=1932,
 *         description="Year the federation was founded (optional, 1800-current year)"
 *     ),
 *     @OA\Property(
 *         property="website",
 *         type="string",
 *         example="https://www.fiba.basketball",
 *         description="Optional official website URL (max 255 characters)"
 *     ),
 *     @OA\Property(
 *         property="contact_email",
 *         type="string",
 *         example="info@fiba.basketball",
 *         description="Optional contact email (max 120 characters)"
 *     )
 * )
 */
class FederationRequestAttributes
{
}
