<?php

namespace App\ApiDoc\Player;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Patch(
 *     path="/api/v1/players/{player}",
 *     operationId="updatePlayer",
 *     tags={"Players"},
 *     summary="Update player",
 *     description="Update endpoint for player",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="player",
 *         in="path",
 *         description="ID of player (UUID)",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             default="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/PlayerUpdateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="UpdatePlayer Successful",
 *         @OA\JsonContent(ref="#/components/schemas/PlayerApiResponse"),
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
class UpdatePlayer extends ApiDoc
{
}

