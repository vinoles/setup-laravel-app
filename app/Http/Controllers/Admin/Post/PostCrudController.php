<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Controllers\Admin\Post\Actions\Index;
use App\Http\Controllers\Admin\Post\Actions\Show;
use App\Http\Controllers\Admin\Post\Actions\Store;
use App\Http\Controllers\Admin\Post\Actions\Update;
use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;

/**
 * Class PostCrudController
 *
 * @property-read CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use Index;
    use Show;
    use Store;
    use Update;
    use UsesBackpackOperations;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/posts');
        CRUD::setEntityNameStrings('post', 'posts');
    }
}

