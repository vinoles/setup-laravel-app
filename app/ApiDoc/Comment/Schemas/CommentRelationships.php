<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CommentRelationships",
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
class CommentRelationships
{
}
