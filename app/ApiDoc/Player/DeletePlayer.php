<?php

namespace App\ApiDoc\Player;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Delete(
 *     path="/api/v1/players/{player}",
 *     operationId="deletePlayer",
 *     tags={"Players"},
 *     summary="Delete player",
 *     description="Delete player endpoint",
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
 *       response="204",
 *       description="Delete Player Successfully",
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
class DeletePlayer extends ApiDoc
{
}

