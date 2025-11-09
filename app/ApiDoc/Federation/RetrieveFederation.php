<?php

namespace App\ApiDoc\Federation;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/v1/federations/{federation}",
 *     summary="Show federation",
 *     description="Retrieve a federation record",
 *     tags={"Federations"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="federation",
 *         in="path",
 *         required=true,
 *         description="Federation identifier (UUID)",
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(ref="#/components/schemas/FederationApiResponse")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Federation not found",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError")
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Server error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError")
 *     )
 * )
 */
class RetrieveFederation extends ApiDoc
{
}
