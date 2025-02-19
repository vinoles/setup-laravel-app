<?php

namespace App\ApiDoc\Auth\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Your password has been reset."
 *         ),
 * )
 */
class ResetPasswordResponse
{
}
