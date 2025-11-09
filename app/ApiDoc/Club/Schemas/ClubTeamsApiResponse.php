<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubTeamsApiResponse",
 *     type="object",
 *
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
 *             example="http://server.example/api/v1/clubs/6bb7c993-88ad-402c-9352-c7eb65d9b8e9/teams"
 *         )
 *     ),
 *     @OA\Property(
 *          property="data",
 *          type="array",
 *
 *          @OA\Items(
 *              ref="#/components/schemas/ClubTeamApiResource",
 *          ),
 *     )
 * )
 */
class ClubTeamsApiResponse {}
