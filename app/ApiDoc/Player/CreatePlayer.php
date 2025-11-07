<?php

namespace App\ApiDoc\Player;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/players",
 *     operationId="createPlayer",
 *     tags={"Players"},
 *     summary="Create player",
 *     description="Create endpoint for player",
 *     security={ {"sanctum": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *             @OA\Schema(ref="#/components/schemas/PlayerCreateRequest"),
 *         ),
 *     ),
 *     @OA\Response(
 *       response="201",
 *       description="CreatePlayer Successful",
 *         @OA\JsonContent(ref="#/components/schemas/CreatePlayerApiResponse"),
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
class CreatePlayer extends ApiDoc
{
}

