<?php

namespace App\ApiDoc\Club;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/clubs",
 *     operationId="createClub",
 *     tags={"Clubs"},
 *     summary="Create club",
 *     description="Create endpoint for club",
*     security={ {"sanctum": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/ClubCreateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="201",
 *       description="CreateClub Successful",
 *         @OA\JsonContent(ref="#/components/schemas/ClubApiResponse"),
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
class CreateClub extends ApiDoc
{
}
