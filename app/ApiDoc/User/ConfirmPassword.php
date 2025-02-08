<?php

namespace App\ApiDoc\User;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/users/confirm-password/{user}",
 *     operationId="confirm password",
 *     @OA\Parameter(
 *         name="user",
 *         in="path",
 *         description="ID of abn (UUID)",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             default="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *         )
 *     ),
 *     tags={"Users"},
 *     summary="Confirm password",
 *     description="Confirm password for critical operations",
 *     security={ {"sanctum": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"password"},
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     format="password",
 *                     description="The user password example",
 *                     default="password"
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Confirm password successful",
 *         @OA\JsonContent(ref="#/components/schemas/ConfirmPasswordResponse"),
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable Entity",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Bad Request",
 *         @OA\JsonContent()
 *     ),
 * )
 *
 */
class ConfirmPassword extends ApiDoc
{
}
