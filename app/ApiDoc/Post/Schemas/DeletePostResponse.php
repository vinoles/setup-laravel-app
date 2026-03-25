<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="DeletePostResponse",
 *     type="object",
 *
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *     ),
 *     @OA\Property(
 *         property="deleting",
 *         type="boolean",
 *         example=true
 *     ),
 * )
 */
class DeletePostResponse {}
