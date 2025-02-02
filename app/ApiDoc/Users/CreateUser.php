<?php

namespace App\ApiDoc\Users;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/users",
 *     operationId="createUser",
 *     tags={"Users"},
 *     summary="Create user",
 *     description="Create endpoint for user",
 *     security={ {"sanctum": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/UserRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="CreateUser Successful",
 *         @OA\JsonContent(ref="#/components/schemas/UserApiResponse"),
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
class CreateUser extends ApiDoc
{
}
