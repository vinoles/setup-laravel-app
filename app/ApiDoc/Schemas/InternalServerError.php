<?php

namespace App\ApiDoc\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="InternalServerError",
 *     type="object",
 *     allOf={
 *         @OA\Schema(ref="#/components/schemas/VersionMeta"),
 *         @OA\Schema(
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     ref="#/components/schemas/InternalServerErrorDetails",
 *                 ),
 *             ),
 *         ),
 *     }
 * )
 */

class InternalServerError
{
}
