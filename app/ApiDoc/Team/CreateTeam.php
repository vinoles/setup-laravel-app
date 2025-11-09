<?php

namespace App\ApiDoc\Team;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/v1/teams",
 *     operationId="createTeam",
 *     tags={"Teams"},
 *     summary="Create team",
 *     description="Create endpoint for teams",
 *     security={ {"sanctum": {} }},
 *
 *     @OA\RequestBody(
 *
 *         @OA\JsonContent(),
 *
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *
 *             @OA\Schema(ref="#/components/schemas/TeamCreateRequest"),
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response="201",
 *         description="Team created",
 *
 *         @OA\JsonContent(ref="#/components/schemas/TeamApiResponse"),
 *     ),
 *
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable entity",
 *
 *         @OA\JsonContent(ref="#/components/schemas/UnprocessableEntityError"),
 *     ),
 *
 *     @OA\Response(
 *         response="500",
 *         description="Internal server error",
 *
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 */
class CreateTeam extends ApiDoc
{
}
