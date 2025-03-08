<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostAuthorRequestRelationship",
 *     type="object",
 *     @OA\Property(
 *         property="author",
 *         type="object",
 *         @OA\Property(
 *              property="data",
 *              type="object",
 *              @OA\Property(
 *                  property="type",
 *                  type="string",
 *                  example="users"
 *              ),
 *              @OA\Property(
 *                  property="id",
 *                  type="string",
 *                  example="08d58e2f-87fa-498d-a2dc-0fca333df772"
 *              ),
 *          ),
 *     ),
 * )
 */
class PostAuthorRequestRelationship
{
}
