<?php

namespace App\ApiDoc\Team;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Delete(
 *     path="/api/v1/teams/{team}",
 *     operationId="deleteTeam",
 *     tags={"Teams"},
 *     summary="Delete team",
 *     description="Delete endpoint for teams",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="team",
 *         in="path",
 *         description="Team identifier (UUID)",
 *         required=true,
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(
 *         response="204",
 *         description="Team deleted"
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Team not found",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal server error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class DeleteTeam extends ApiDoc
{
}
