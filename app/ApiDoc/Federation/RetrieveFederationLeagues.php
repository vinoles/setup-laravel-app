<?php

namespace App\ApiDoc\Federation;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/v1/federations/{federation}/leagues",
 *     operationId="retrieveFederationLeagues",
 *     tags={"Federations"},
 *     summary="Show federation leagues information",
 *     description="Show federation leagues endpoint",
 *     security={{"sanctum": {}}},
 *
 *     @OA\Parameter(
 *         name="federation",
 *         in="path",
 *         description="ID of federation (UUID)",
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
 *       description="Retrieve Federation Successfully",
 *
 *       @OA\JsonContent(ref="#/components/schemas/FederationLeaguesApiResponse"),
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
class RetrieveFederationLeagues extends ApiDoc {}
