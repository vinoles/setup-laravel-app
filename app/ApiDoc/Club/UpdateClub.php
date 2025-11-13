<?php

namespace App\ApiDoc\Club;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Patch(
 *     path="/api/v1/clubs/{club}",
 *     operationId="updateClub",
 *     tags={"Clubs"},
 *     summary="Update club",
 *     description="Update club endpoint",
 *     security={ {"sanctum": {} }},
 *
 *     @OA\Parameter(
 *         name="club",
 *         in="path",
 *         description="ID of club (UUID)",
 *         required=true,
 *
 *         @OA\Schema(
 *             type="string",
 *             default="0ec37904-ce76-4e3a-b6c5-0a3b77d70e54"
 *         )
 *     ),
 *
 *     @OA\RequestBody(
 *
 *         @OA\JsonContent(),
 *
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *
 *             @OA\Schema(ref="#/components/schemas/ClubUpdateRequest"),
 *         ),
 *     ),
 *
 *     @OA\Response(
 *       response="200",
 *       description="Update Club Successfully",
 *
 *       @OA\JsonContent(ref="#/components/schemas/UpdateClubApiResponse"),
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
 *         response="422",
 *         description="Unprocessable Entity",
 *
 *         @OA\JsonContent(ref="#/components/schemas/UnprocessableEntityError"),
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
class UpdateClub extends ApiDoc {}
