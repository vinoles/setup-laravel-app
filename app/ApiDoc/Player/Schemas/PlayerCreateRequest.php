<?php

namespace App\ApiDoc\Player\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PlayerCreateRequest",
 *     type="object",
 *     required={"first_name", "last_name"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *              property="type",
 *              type="string",
 *              example="players"
 *          ),
 *          @OA\Property(
 *              property="attributes",
 *              type="object",
 *              ref="#/components/schemas/PlayerRequestAttributes",
 *          ),
 *    ),
 * )
 */
class PlayerCreateRequest
{
}
