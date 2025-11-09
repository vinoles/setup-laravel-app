<?php

namespace App\ApiDoc\League;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Patch(
 *     path="/api/v1/leagues/{league}",
 *     operationId="updateLeague",
 *     tags={"Leagues"},
 *     summary="Update league",
 *     description="Update endpoint for leagues",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="league",
 *         in="path",
 *         description="League identifier (UUID)",
 *         required=true,
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/LeagueUpdateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="League updated",
 *         @OA\JsonContent(ref="#/components/schemas/LeagueApiResponse"),
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="League not found",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Validation error",
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
class UpdateLeague extends ApiDoc
{
}
