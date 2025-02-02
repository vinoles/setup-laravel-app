<?php

namespace App\ApiDoc\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PaginationMeta",
 *     type="object",
 *     @OA\Property(
 *         property="page",
 *         type="object",
 *         @OA\Property(property="currentPage", type="integer", example=1),
 *         @OA\Property(property="from", type="integer", example=1),
 *         @OA\Property(property="lastPage", type="integer", example=1),
 *         @OA\Property(property="perPage", type="integer", example=10),
 *         @OA\Property(property="to", type="integer", example=1),
 *         @OA\Property(property="total", type="integer", example=1)
 *     )
 * )
 */

class PaginationMeta
{
}
