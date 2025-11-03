<?php

namespace App\ApiDoc\Club;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/clubs",
 *     operationId="retrieveClubs",
 *     tags={"Clubs"},
 *     summary="List clubs",
 *     description="List clubs endpoint",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="page[number]",
 *         in="query",
 *         description="Page number",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *             default=1
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="page[size]",
 *         in="query",
 *         description="Page size",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *             default=10
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="sort",
 *         in="query",
 *         description="Sort field",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             default="-createdAt"
 *         )
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve Clubs Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/ClubsApiResponse"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal Server Error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class RetrieveClubs extends ApiDoc
{
}
