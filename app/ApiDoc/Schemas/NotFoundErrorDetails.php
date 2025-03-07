<?php

namespace App\ApiDoc\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="NotFoundErrorDetails",
 *     type="object",
 *     @OA\Property(
 *         property="detail",
 *         type="string",
 *         example="The route api/v1/posts/cfc5c0c4-74d8-4c13-9f51-290d87a22d42s could not be found."
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
 *         example="404"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         example="Not Found"
 *     ),
 * )
 */

class NotFoundErrorDetails
{
}
