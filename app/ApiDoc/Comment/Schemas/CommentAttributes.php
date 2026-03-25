<?php

namespace App\ApiDoc\Comment\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *
 *     @OA\Property(
 *         property="content",
 *         type="string",
 *         example="the content application test comment example"
 *     ),
 * )
 */
class CommentAttributes {}
