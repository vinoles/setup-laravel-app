<?php

namespace App\ApiDoc\Team;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Patch(
 *     path="/api/v1/teams/{team}",
 *     operationId="updateTeam",
 *     tags={"Teams"},
 *     summary="Update team",
 *     description="Update endpoint for teams",
 *     security={ {"sanctum": {} }},
 *
 *     @OA\Parameter(
 *         name="team",
 *         in="path",
 *         description="Team identifier (UUID)",
 *         required=true,
 *
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *
 *     @OA\RequestBody(
 *
 *         @OA\JsonContent(),
 *
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *
 *             @OA\Schema(ref="#/components/schemas/TeamUpdateRequest"),
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response="200",
 *         description="Team updated",
 *
 *         @OA\JsonContent(ref="#/components/schemas/TeamApiResponse"),
 *     ),
 *
 *     @OA\Response(
 *         response="404",
 *         description="Team not found",
 *
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *
 *     @OA\Response(
 *         response="422",
 *         description="Validation error",
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
class UpdateTeam extends ApiDoc
{
}
