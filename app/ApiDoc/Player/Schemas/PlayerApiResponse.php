<?php

namespace App\ApiDoc\Player\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PlayerApiResponse",
 *     type="object",
 *     @OA\Property(
 *         property="jsonapi",
 *         type="object",
 *         @OA\Property(
 *             property="version",
 *             type="string",
 *             example="1.0"
 *         )
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/players/0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *         )
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/PlayerApiResource",
 *     )
 * )
 */
class PlayerApiResponse
{
}

