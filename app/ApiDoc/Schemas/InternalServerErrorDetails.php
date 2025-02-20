<?php

namespace App\ApiDoc\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="InternalServerErrorDetails",
 *     type="object",
 *     @OA\Property(
 *         property="detail",
 *         type="string",
 *         example="message error example"
 *     ),
 *     @OA\Property(
 *         property="meta",
 *         type="object",
 *         @OA\Property(
 *             property="exception",
 *             type="string",
 *             example="ParseError"
 *         )
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="500"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         example="Internal Server Error"
 *     ),
 * )
 */

class InternalServerErrorDetails
{
}
