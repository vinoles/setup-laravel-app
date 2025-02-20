<?php

namespace App\ApiDoc\User\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
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
 *         property="meta",
 *         type="object",
 *         @OA\Property(
 *             property="status",
 *             type="boolean",
 *             example=true
 *         )
 *     )
 * )
 */
class ConfirmPasswordResponse {}
