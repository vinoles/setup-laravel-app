<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubUpdateRequest",
 *     type="object",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *              property="type",
 *              type="string",
 *              example="clubs"
 *          ),
 *          @OA\Property(
 *              property="id",
 *              type="string",
 *              example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *          ),
 *          @OA\Property(
 *              property="attributes",
 *              type="object",
 *              ref="#/components/schemas/ClubRequestAttributes",
 *          ),
 *    ),
 * )
 */
class ClubUpdateRequest
{
}
