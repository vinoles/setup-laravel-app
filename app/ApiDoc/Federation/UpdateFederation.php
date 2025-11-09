<?php

namespace App\ApiDoc\Federation;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Patch(
 *     path="/api/v1/federations/{federation}",
 *     operationId="updateFederation",
 *     tags={"Federations"},
 *     summary="Update federation",
 *     description="Update endpoint for federations",
 *     security={{"sanctum": {}}},
 *
 *     @OA\Parameter(
 *         name="federation",
 *         in="path",
 *         description="Federation identifier (UUID)",
 *         required=true,
 *
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *
 *     @OA\RequestBody(
 *
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *
 *             @OA\Schema(ref="#/components/schemas/FederationUpdateRequest"),
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response="200",
 *         description="Federation updated",
 *
 *         @OA\JsonContent(ref="#/components/schemas/FederationApiResponse"),
 *     ),
 *
 *     @OA\Response(
 *         response="404",
 *         description="Federation not found",
 *
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *
 *     @OA\Response(
 *         response="422",
 *         description="Validation error",
 *
 *         @OA\JsonContent(ref="#/components/schemas/UnprocessableEntityError"),
 *     ),
 *
 *     @OA\Response(
 *         response="500",
 *         description="Internal server error",
 *
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 */
class UpdateFederation extends ApiDoc {}
