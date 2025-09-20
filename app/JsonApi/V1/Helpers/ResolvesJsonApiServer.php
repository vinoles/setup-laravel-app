<?php

namespace App\JsonApi\V1\Helpers;

use App\JsonApi\V1\Server;

trait ResolvesJsonApiServer
{
    public function resolveServer(): Server
    {
        return app(Server::class, ['name' => 'v1']);
    }
}
