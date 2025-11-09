<?php

namespace App\ApiDoc\Federation\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FederationCreateRequest",
 *     type="object",
 *     required={"data"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         required={"type","attributes"},
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             example="federations"
 *         ),
 *         @OA\Property(
 *             property="attributes",
 *             ref="#/components/schemas/FederationRequestAttributes"
 *         )
 *     )
 * )
 */
class FederationCreateRequest
{
}
