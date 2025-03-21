<?php

namespace App\ApiDoc\Auth\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     @OA\Property(
 *         property="meta",
 *         type="object",
 *         @OA\Property(
 *             property="token",
 *             type="string",
 *             example="5|X46fIoLGotBF4AiSTnjykT5fECyymL6RuxhY1PU722b37b1b"
 *         )
 *     ),
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
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/users/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *         )
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             example="users"
 *         ),
 *         @OA\Property(
 *             property="id",
 *             type="string",
 *             example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *         ),
 *         @OA\Property(
 *             property="attributes",
 *             ref="#/components/schemas/UserAttributes"
 *         ),
 *         @OA\Property(
 *             property="links",
 *             type="object",
 *             @OA\Property(
 *                 property="self",
 *                 type="string",
 *                 example="http://server.example/api/v1/users/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *             )
 *         )
 *     )
 * )
 */
class LoginAndRegisterResponse
{
}
