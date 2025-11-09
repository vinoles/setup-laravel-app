<?php

namespace App\ApiDoc\Player;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/players/{player}",
 *     operationId="retrievePlayer",
 *     tags={"Players"},
 *     summary="Show player",
 *     description="Show player endpoint",
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
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve Player Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/PlayerApiResponse"),
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
class RetrievePlayer extends ApiDoc
{
}
