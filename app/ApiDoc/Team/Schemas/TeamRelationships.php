<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamRelationships",
 *     type="object",
 *     @OA\Property(
 *         property="club",
 *         type="object",
 *         @OA\Property(
 *             property="links",
 *             type="object",
 *             @OA\Property(
 *                 property="related",
 *                 type="string",
 *                 example="http://server.example/api/v1/teams/2b6a4bfa-4d90-4f64-8d39-2d8948d0e888/club"
 *             ),
 *             @OA\Property(
 *                 property="self",
 *                 type="string",
 *                 example="http://server.example/api/v1/teams/2b6a4bfa-4d90-4f64-8d39-2d8948d0e888/relationships/club"
 *             )
 *         ),
 *         @OA\Property(
 *             property="data",
 *             type="object",
 *             @OA\Property(
 *                 property="type",
 *                 type="string",
 *                 example="clubs"
 *             ),
 *             @OA\Property(
 *                 property="id",
 *                 type="string",
 *                 format="uuid",
 *                 example="a8c1fdb7-8c1e-4c1a-8d0a-0c1fdb7a8c1f"
 *             )
 *         )
 *     )
 * )
 */
class TeamRelationships
{
}
