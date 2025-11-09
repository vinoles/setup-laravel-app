<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubApiResource",
 *     type="object",
 *     @OA\Property(
 *          property="type",
 *          type="string",
 *          example="clubs"
 *      ),
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *     ),
 *     @OA\Property(
 *          property="attributes",
 *          type="object",
 *          ref="#/components/schemas/ClubAttributes",
 *      ),
 *      @OA\Property(
 *          property="links",
 *          type="object",
 *          @OA\Property(
 *              property="self",
 *              type="string",
 *              example="http://server.example/api/v1/clubs/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *          )
 *      )
 * )
 */
class ClubApiResource
{
}
