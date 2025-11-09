<?php

namespace App\ApiDoc\Federation\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FederationLeaguesApiResponse",
 *     type="object",
 *
 *     @OA\Property(
 *         property="jsonapi",
 *         type="object",
 *         @OA\Property(
 *             property="version",
 *             type="string",
 *             example="1.0"
 *         )
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="self",
 *             type="string",
 *             example="http://server.example/api/v1/federations/5a0d8c41-3f02-4b44-9f1d-8a4d6b934e0c/leagues"
 *         )
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *
 *         @OA\Items(ref="#/components/schemas/LeagueApiResource")
 *     )
 * )
 */
class FederationLeaguesApiResponse {}
