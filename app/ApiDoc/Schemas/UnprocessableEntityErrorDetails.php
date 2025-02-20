<?php

namespace App\ApiDoc\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="UnprocessableEntityErrorDetails",
 *     type="object",
 *     @OA\Property(
 *         property="detail",
 *         type="string",
 *         example="message error example"
 *     ),
 *     @OA\Property(
 *         property="source",
 *         type="object",
 *         @OA\Property(
 *             property="pointer",
 *             type="string",
 *             example="/property"
 *         )
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="422"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         example="Unprocessable Entity"
 *     ),
 * )
 */

class UnprocessableEntityErrorDetails
{
}
