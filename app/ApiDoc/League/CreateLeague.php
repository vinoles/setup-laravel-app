<?php

namespace App\ApiDoc\League;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/leagues",
 *     operationId="createLeague",
 *     tags={"Leagues"},
 *     summary="Create league",
 *     description="Create endpoint for leagues",
 *     security={{"sanctum": {}}},
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/LeagueCreateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="League created",
 *         @OA\JsonContent(ref="#/components/schemas/LeagueApiResponse"),
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable entity",
 *         @OA\JsonContent(ref="#/components/schemas/UnprocessableEntityError"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal server error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class CreateLeague extends ApiDoc
{
}
