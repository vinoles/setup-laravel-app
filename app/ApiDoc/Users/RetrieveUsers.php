<?php

namespace App\ApiDoc\Users;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *     path="/api/v1/users",
 *     operationId="retrieveUsers",
 *     tags={"Users"},
 *     summary="List users",
 *     description="List users endpoint",
 *     security={ {"sanctum": {} }},
 *     @OA\Parameter(
 *         name="accept",
 *         in="header",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             default="application/vnd.api+json"
 *         ),
 *         description="Media type to accept"
 *     ),
 *     @OA\Parameter(
 *         name="page[number]",
 *         required=true,
 *         in="query",
 *         @OA\Schema(
 *             type="integer",
 *             default=1
 *         ),
 *         description="Number page for pagination"
 *     ),
 *     @OA\Parameter(
 *         name="page[size]",
 *         required=true,
 *         in="query",
 *         @OA\Schema(
 *             type="integer",
 *             default=10
 *         ),
 *         description="Number of elements for page"
 *     ),
 *     @OA\Parameter(
 *         name="filter[first_name]",
 *         in="query",
 *         @OA\Schema(
 *         type="string",
 *         ),
 *         description="Filter for firstName attribute"
 *     ),
 *     @OA\Response(
 *       response="200",
 *       description="Retrieve Users Successfully",
 *       @OA\JsonContent(ref="#/components/schemas/UsersApiResponse"),
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\MediaType(
 *                 mediaType="application/vnd.api+json"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Bad Request",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\MediaType(
 *                 mediaType="application/vnd.api+json"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=406,
 *         description="Not Acceptable",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\MediaType(
 *                 mediaType="application/vnd.api+json"
 *             )
 *         )
 *     )
 * )
 *
 */
class RetrieveUsers extends ApiDoc
{
}
