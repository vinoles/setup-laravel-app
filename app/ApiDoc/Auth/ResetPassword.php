<?php

namespace App\ApiDoc\Auth;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/auth/reset-password",
 *     operationId="reset-password",
 *     tags={"Auth"},
 *     summary="reset password user",
 *     description="reset password endpoint for user",
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"email", "password"},
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     format="email",
 *                     default="user-test@app.com"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     format="password",
 *                     description="The user password example",
 *                     default="password"
 *                 ),
 *                  @OA\Property(
 *                      property="password_confirmation",
 *                      type="string",
 *                      format="password",
 *                      description="Confirm password for the user account",
 *                      example="password"
 *                 ),
 *                  @OA\Property(
 *                      property="token",
 *                      type="string",
 *                      format="token",
 *                      description="Confirm password for the user account",
 *                      example="5|X46fIoLGotBF4AiSTnjykT5fECyymL6RuxhY1PU722b37b1b"
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Request reset link Successful",
 *         @OA\JsonContent(ref="#/components/schemas/ResetPasswordResponse"),
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
class ResetPassword extends ApiDoc
{
}
