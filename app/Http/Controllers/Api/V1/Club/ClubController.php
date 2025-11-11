<?php

namespace App\Http\Controllers\Api\V1\Club;

use App\Http\Controllers\Api\V1\Club\Helpers\Destroy;
use App\Http\Controllers\Api\V1\Club\Helpers\Store;
use App\Http\Controllers\Api\V1\Club\Helpers\Update;
use App\Http\Controllers\Controller;
use LaravelJsonApi\Core\Document\Concerns\Serializable;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\AttachRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\DetachRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchMany;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchOne;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchRelated;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\FetchRelationship;
use LaravelJsonApi\Laravel\Http\Controllers\Actions\UpdateRelationship;

class ClubController extends Controller
{
    use AttachRelationship;
    use DetachRelationship;
    use FetchMany;
    use FetchOne;
    use FetchRelated;
    use FetchRelationship;
    use Serializable;
    use UpdateRelationship;
    use Update;
    use Store;
    use Destroy;
}
