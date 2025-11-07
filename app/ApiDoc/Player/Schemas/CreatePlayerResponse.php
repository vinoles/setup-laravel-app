<?php

namespace App\ApiDoc\Player\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CreatePlayerResponse",
 *     type="object",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *     ),
 *     @OA\Property(
 *         property="creating",
 *         type="boolean",
 *         example="true"
 *     ),
 * )
 */
class CreatePlayerResponse
{
}

