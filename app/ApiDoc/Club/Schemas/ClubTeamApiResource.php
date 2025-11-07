<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubTeamApiResource",
 *     type="object",
 *     @OA\Property(
 *          property="type",
 *          type="string",
 *          example="teams"
 *      ),
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *     ),
 *     @OA\Property(
 *          property="attributes",
 *          type="array",
 *          @OA\Items(
 *              ref="#/components/schemas/ClubTeamAttributes",
 *          ),
 *      ),
 *      @OA\Property(
 *          property="relationships",
 *          ref="#/components/schemas/ClubTeamRelationships"
 *      ),
 *      @OA\Property(
 *          property="links",
 *          type="object",
 *          @OA\Property(
 *              property="self",
 *              type="string",
 *              example="http://sever.example/api/v1/teams/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *          )
 *      )
 * )
 */
class ClubTeamApiResource
{
}
