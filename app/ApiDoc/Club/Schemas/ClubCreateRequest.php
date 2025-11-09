<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubCreateRequest",
 *     type="object",
 *     required={"name", "address"},
 *
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *              property="type",
 *              type="string",
 *              example="clubs"
 *          ),
 *          @OA\Property(
 *              property="attributes",
 *              type="object",
 *              ref="#/components/schemas/ClubRequestAttributes",
 *          ),
 *    ),
 * )
 */
class ClubCreateRequest {}
