<?php

namespace App\ApiDoc\Post\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostCommentRelationships",
 *     type="object",
 *     @OA\Property(
 *         property="user",
 *         type="object",
 *         @OA\Property(
 *              property="links",
 *              type="object",
 *              @OA\Property(
 *                  property="related",
 *                  type="string",
 *                  example="http://server.example/api/v1/comments/8eff569d-bd24-46b4-b080-027c182c605e/user"
 *              ),
 *              @OA\Property(
 *                  property="self",
 *                  type="string",
 *                  example="http://server.example/api/v1/comments/8eff569d-bd24-46b4-b080-027c182c605e/relationships/user"
 *              ),
 *          ),
 *     ),
  *     @OA\Property(
 *         property="post",
 *         type="object",
 *         @OA\Property(
 *              property="links",
 *              type="object",
 *              @OA\Property(
 *                  property="related",
 *                  type="string",
 *                  example="http://server.example/api/v1/comments/8eff569d-bd24-46b4-b080-027c182c605e/post"
 *              ),
 *              @OA\Property(
 *                  property="self",
 *                  type="string",
 *                  example="http://server.example/api/v1/comments/8eff569d-bd24-46b4-b080-027c182c605e/relationships/post"
 *              ),
 *          ),
 *     ),
 * )
 */
class PostCommentRelationships
{
}
