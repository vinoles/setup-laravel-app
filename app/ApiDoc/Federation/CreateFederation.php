<?php

namespace App\ApiDoc\Federation;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/v1/federations",
 *     operationId="createFederation",
 *     tags={"Federations"},
 *     summary="Create federation",
 *     description="Create endpoint for federations",
 *     security={{"sanctum": {}}},
 *
 *     @OA\RequestBody(
 *
 *         @OA\MediaType(
 *             mediaType="application/vnd.api+json",
 *
 *             @OA\Schema(ref="#/components/schemas/FederationCreateRequest"),
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response="201",
 *         description="Federation created",
 *
 *         @OA\JsonContent(ref="#/components/schemas/FederationApiResponse"),
 *     ),
 *
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable entity",
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
class CreateFederation extends ApiDoc {}
