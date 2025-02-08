<?php

namespace App\ApiDoc\Auth;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/auth/reset-password-link",
 *     operationId="reset-password-link",
 *     tags={"Auth"},
 *     summary="Password reset link user",
 *     description="Password reset link endpoint for user",
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"email"},
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     format="email",
 *                     default="user-test@app.com"
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="204",
 *       description="Logout Successful",
 *       @OA\JsonContent()
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
class PasswordResetLink extends ApiDoc
{
}
