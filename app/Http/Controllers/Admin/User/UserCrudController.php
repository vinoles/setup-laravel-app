<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Controllers\Admin\User\Actions\Index;
use App\Http\Controllers\Admin\User\Actions\Show;
use App\Http\Controllers\Admin\User\Actions\Store;
use App\Http\Controllers\Admin\User\Actions\Update;
use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;

/**
 * Class UserCrudController
 *
 * @property-read CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('user', 'users');
    }
}

