<?php

namespace App\ApiDoc\Player\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PlayerUpdateRequest",
 *     type="object",
 *
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *              property="type",
 *              type="string",
 *              example="players"
 *          ),
 *         @OA\Property(
 *              property="id",
 *              type="string",
 *              example="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *          ),
 *          @OA\Property(
 *              property="attributes",
 *              type="object",
 *              ref="#/components/schemas/PlayerRequestAttributes",
 *      ),
 *   ),
 * )
 */
class PlayerUpdateRequest {}
