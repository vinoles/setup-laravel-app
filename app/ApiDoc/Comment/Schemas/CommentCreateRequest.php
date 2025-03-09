<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CommentCreateRequest",
 *     type="object",
 *     required={"content", "slug", "title"},
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *              property="type",
 *              type="string",
 *              example="comments"
 *          ),
 *          @OA\Property(
 *              property="attributes",
 *              type="object",
 *              ref="#/components/schemas/CommentRequestAttributes",
 *          ),
 *          @OA\Property(
 *              property="relationships",
 *              ref="#/components/schemas/CommentRequestRelationship"
 *          ),
 *    ),
 * )
 */
class CommentCreateRequest
{
}
