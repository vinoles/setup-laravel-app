<?php

namespace App\ApiDoc\Auth;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/auth/logout",
 *     operationId="logout",
 *     tags={"Auth"},
 *     summary="logout user",
 *     description="Logout endpoint for user",
 *     security={ {"sanctum": {} }},
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
class Logout extends ApiDoc
{
}
