<?php

namespace App\ApiDoc\League;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Delete(
 *     path="/api/v1/leagues/{league}",
 *     operationId="deleteLeague",
 *     tags={"Leagues"},
 *     summary="Delete league",
 *     description="Delete endpoint for leagues",
 *     security={{"sanctum": {}}},
 *
 *     @OA\Parameter(
 *         name="league",
 *         in="path",
 *         description="League identifier (UUID)",
 *         required=true,
 *
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *
 *     @OA\Response(
 *         response="204",
 *         description="League deleted"
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="League not found",
 *
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
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
class DeleteLeague extends ApiDoc {}
