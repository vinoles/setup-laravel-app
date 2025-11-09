<?php

namespace App\ApiDoc\League\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="LeagueFederationRequestRelationship",
 *     type="object",
 *     @OA\Property(
 *         property="federation",
 *         type="object",
 *         description="Required association to an existing federation",
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
class LeagueFederationRequestRelationship
{
}
