<?php

namespace App\ApiDoc\Auth;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/auth/login",
 *     operationId="login",
 *     tags={"Auth"},
 *     summary="login user",
 *     description="Login endpoint for user",
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
 *                     default="user-test@setup-laravel-app.com"
 *                 ),
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
 *       description="Login Successful",
 *         @OA\JsonContent(ref="#/components/schemas/LoginAndRegisterResponse"),
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(ref="#/components/schemas/UnprocessableEntityError"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal Server Error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class Login extends ApiDoc
{
}
