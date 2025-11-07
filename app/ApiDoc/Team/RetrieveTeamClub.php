<?php

namespace App\ApiDoc\Team;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/teams/{team}/club",
 *     operationId="retrieveTeamClub",
 *     tags={"Teams"},
 *     summary="Show team club information",
 *     description="Show team club endpoint",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="team",
 *         in="path",
 *         description="ID of team (UUID)",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             default="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *         )
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve Team Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/ClubApiResponse"),
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Not found error",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal Server Error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class RetrieveTeamClub extends ApiDoc
{
}
