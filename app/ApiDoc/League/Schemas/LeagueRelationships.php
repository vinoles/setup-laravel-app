<?php

namespace App\ApiDoc\League\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="LeagueRelationships",
 *     type="object",
 *     @OA\Property(
 *         property="federation",
 *         type="object",
 *         @OA\Property(
 *             property="links",
 *             type="object",
 *             @OA\Property(
 *                 property="related",
 *                 type="string",
 *                 example="http://server.example/api/v1/leagues/5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c/federation"
 *             ),
 *             @OA\Property(
 *                 property="self",
 *                 type="string",
 *                 example="http://server.example/api/v1/leagues/5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c/relationships/federation"
 *             )
 *         ),
 *         @OA\Property(
 *             property="data",
 *             type="object",
 *             @OA\Property(
 *                 property="type",
 *                 type="string",
 *                 example="federations"
 *             ),
 *             @OA\Property(
 *                 property="id",
 *                 type="string",
 *                 format="uuid",
 *                 example="b9d1cf8a-8f2e-4b74-a364-e77e9d2f1d60"
 *             )
 *         )
 *     )
 * )
 */
class LeagueRelationships
{
}
