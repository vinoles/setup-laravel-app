<?php

namespace App\ApiDoc\Auth;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/auth/register",
 *     operationId="register",
 *     tags={"Auth"},
 *     summary="register user",
 *     description="Register endpoint for user",
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(ref="#/components/schemas/RegisterRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Register Successful",
 *         @OA\JsonContent(ref="#/components/schemas/LoginAndRegisterResponse"),
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
class Register extends ApiDoc
{
}
