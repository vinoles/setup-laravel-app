<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="DeletePostApiResponse",
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
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/DeletePostResponse",
 *     )
 * )
 */
class DeletePostApiResponse {}
