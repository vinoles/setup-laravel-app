<?php

namespace App\ApiDoc\League;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/v1/leagues/{league}/federation",
 *     operationId="retrieveLeagueFederation",
 *     tags={"Leagues"},
 *     summary="Show league federation information",
 *     description="Show league federation endpoint",
 *     security={{"sanctum": {}}},
 *
 *     @OA\Parameter(
 *         name="league",
 *         in="path",
 *         description="ID of league (UUID)",
 *         required=true,
 *
 *         @OA\Schema(
 *             type="string",
 *             default="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *         )
 *     ),
 *
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve League Successfully",
 *
 *       @OA\JsonContent(ref="#/components/schemas/FederationApiResponse"),
 *     ),
 *
 *     @OA\Response(
 *         response="404",
 *         description="Not found error",
 *
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *
 *     @OA\Response(
 *         response="500",
 *         description="Internal Server Error",
 *
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 */
class RetrieveLeagueFederation extends ApiDoc {}
