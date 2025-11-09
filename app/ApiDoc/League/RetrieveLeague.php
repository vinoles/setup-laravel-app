<?php

namespace App\ApiDoc\League;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/v1/leagues/{league}",
 *     summary="Show league",
 *     description="Retrieve a league record",
 *     tags={"Leagues"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="league",
 *         in="path",
 *         required=true,
 *         description="League identifier (UUID)",
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(ref="#/components/schemas/LeagueApiResponse")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="League not found",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Server error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError")
 *     )
 * )
 */
class RetrieveLeague extends ApiDoc
{
}
