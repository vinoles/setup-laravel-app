<?php

namespace App\JsonApi\V1;

use App\JsonApi\V1\Comments\CommentSchema;
use App\JsonApi\V1\Posts\PostSchema;
use App\JsonApi\V1\Tags\TagSchema;
use App\JsonApi\V1\Users\UserSchema;
use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{

    /**
     * The base URI namespace for this server.
     *
     * @var string
     */
    protected string $baseUri = '/api/v1';

    /**
     * Bootstrap the server when it is handling an HTTP request.
     *
     * @return void
     */
    public function serving(): void
    {
        // no-op
    }

    /**
     * Get the server's list of schemas.
     *
     * @return array
     */
    protected function allSchemas(): array
    {
        return [
            // @TODO
            UserSchema::class,
            PostSchema::class,
            CommentSchema::class,
            TagSchema::class,
        ];
    }
}
