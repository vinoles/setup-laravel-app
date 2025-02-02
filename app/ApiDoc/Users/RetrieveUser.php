<?php

namespace App\ApiDoc\Users;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/users/{user}",
 *     operationId="retrieveUser",
 *     tags={"Users"},
 *     summary="Show user",
 *     description="Show user endpoint",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="user",
 *         in="path",
 *         description="ID of user (UUID)",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             default="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *         )
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve User Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/UserApiResponse"),
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\MediaType(
 *                 mediaType="application/vnd.api+json"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Bad Request",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\MediaType(
 *                 mediaType="application/vnd.api+json"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=406,
 *         description="Not Acceptable",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\MediaType(
 *                 mediaType="application/vnd.api+json"
 *             )
 *         )
 *     )
 * )
 *
 */
class RetrieveUser extends ApiDoc
{
}
