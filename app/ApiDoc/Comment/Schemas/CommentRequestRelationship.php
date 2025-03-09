<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CommentRequestRelationship",
 *     type="object",
 *     @OA\Property(
 *         property="user",
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
 *     @OA\Property(
 *         property="post",
 *         type="object",
 *         @OA\Property(
 *              property="data",
 *              type="object",
 *              @OA\Property(
 *                  property="type",
 *                  type="string",
 *                  example="posts"
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
class CommentRequestRelationship
{
}
