<?php

namespace App\ApiDoc\Team;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/v1/teams/{team}",
 *     summary="Show team",
 *     description="Retrieve a team along with its club information",
 *     tags={"Teams"},
 *     security={ {"sanctum": {} }},
 *
 *     @OA\Parameter(
 *         name="team",
 *         in="path",
 *         required=true,
 *         description="Team identifier (UUID)",
 *
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *
 *         @OA\JsonContent(ref="#/components/schemas/TeamApiResponse")
 *     ),
 *
 *     @OA\Response(
 *         response=404,
 *         description="Team not found",
 *
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     ),
 *
 *     @OA\Response(
 *         response=500,
 *         description="Server error",
 *
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError")
 *     )
 * )
 */
class RetrieveTeam extends ApiDoc {}
