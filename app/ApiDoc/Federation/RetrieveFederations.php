<?php

namespace App\ApiDoc\Federation;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/v1/federations",
 *     summary="List federations",
 *     description="Retrieve a paginated list of federations",
 *     tags={"Federations"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="page[number]",
 *         in="query",
 *         required=false,
 *         description="Page number",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Parameter(
 *         name="page[size]",
 *         in="query",
 *         required=false,
 *         description="Items per page",
 *         @OA\Schema(type="integer", example=10)
 *     ),
 *     @OA\Parameter(
 *         name="sort",
 *         in="query",
 *         required=false,
 *         description="Sort field (e.g. -createdAt)",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(ref="#/components/schemas/FederationsApiResponse")
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Server error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError")
 *     )
 * )
 */
class RetrieveFederations extends ApiDoc
{
}
