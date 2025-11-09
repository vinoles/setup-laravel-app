<?php

namespace App\ApiDoc\Federation\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FederationApiResource",
 *     type="object",
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="federations"
 *     ),
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c"
 *     ),
 *     @OA\Property(
 *         property="attributes",
 *         ref="#/components/schemas/FederationAttributes"
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/federations/5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c"
 *         )
 *     )
 * )
 */
class FederationApiResource
{
}
