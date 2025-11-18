<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Controllers\Api\V1\Post\Actions\Destroy;
use App\Http\Controllers\Api\V1\Post\Actions\Store;
use App\Http\Controllers\Api\V1\Post\Actions\Update;
use App\Http\Controllers\Controller;
use LaravelJsonApi\Core\Document\Concerns\Serializable;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\AttachRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\DetachRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchMany;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchOne;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchRelated;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\UpdateRelationship;

class PostController extends Controller
{
    use AttachRelationship;
    use Destroy;
    use DetachRelationship;
    use FetchMany;
    use FetchOne;
    use FetchRelated;
    use FetchRelationship;
    use Serializable;
    use Store;
    use Update;
    use UpdateRelationship;
}

