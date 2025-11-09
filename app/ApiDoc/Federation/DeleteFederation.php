<?php

namespace App\ApiDoc\Federation;

use App\ApiDoc\ApiDoc;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Delete(
 *     path="/api/v1/federations/{federation}",
 *     operationId="deleteFederation",
 *     tags={"Federations"},
 *     summary="Delete federation",
 *     description="Delete endpoint for federations",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="federation",
 *         in="path",
 *         description="Federation identifier (UUID)",
 *         required=true,
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(
 *         response="204",
 *         description="Federation deleted"
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Federation not found",
 *         @OA\JsonContent(ref="#/components/schemas/NotFoundError"),
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="Internal server error",
 *         @OA\JsonContent(ref="#/components/schemas/InternalServerError"),
 *     ),
 * )
 *
 */
class DeleteFederation extends ApiDoc
{
}
