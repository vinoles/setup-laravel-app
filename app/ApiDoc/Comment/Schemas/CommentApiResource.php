<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CommentApiResource",
 *     type="object",
 *     @OA\Property(
 *          property="type",
 *          type="string",
 *          example="comments"
 *      ),
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *     ),
 *     @OA\Property(
 *          property="attributes",
 *          type="objet",
 *          ref="#/components/schemas/CommentAttributes",
 *      ),
 *      @OA\Property(
 *          property="relationships",
 *          ref="#/components/schemas/CommentRelationships"
 *      ),
 *      @OA\Property(
 *          property="links",
 *          type="object",
 *          @OA\Property(
 *              property="self",
 *              type="string",
 *              example="http://sever.example/api/v1/comments/6bb7c993-88ad-402c-9352-c7eb65d9b8e9"
 *          )
 *      )
 * )
 */
class CommentApiResource
{
}
