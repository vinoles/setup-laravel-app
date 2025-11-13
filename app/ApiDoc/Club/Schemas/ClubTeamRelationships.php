<?php

namespace App\ApiDoc\Club\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ClubTeamRelationships",
 *     type="object",
 *
 *     @OA\Property(
 *         property="club",
 *         type="object",
 *         @OA\Property(
 *              property="links",
 *              type="object",
 *              @OA\Property(
 *                  property="related",
 *                  type="string",
 *                  example="http://server.example/api/v1/teams/8eff569d-bd24-46b4-b080-027c182c605e/club"
 *              ),
 *              @OA\Property(
 *                  property="self",
 *                  type="string",
 *                  example="http://server.example/api/v1/teams/8eff569d-bd24-46b4-b080-027c182c605e/relationships/club"
 *              ),
 *          ),
 *     ),
 * )
 */
class ClubTeamRelationships {}
