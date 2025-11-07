<?php

namespace App\ApiDoc\Team\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TeamClubRequestRelationship",
 *     type="object",
 *     @OA\Property(
 *         property="club",
 *         type="object",
 *         nullable=true,
 *         description="Optional association to an existing club",
 *         @OA\Property(
 *             property="data",
 *             type="object",
 *             nullable=true,
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
class TeamClubRequestRelationship
{
}
