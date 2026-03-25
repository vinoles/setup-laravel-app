<?php

namespace App\Http\Controllers\Admin\Club;

use App\Http\Controllers\Admin\Club\Actions\Index;
use App\Http\Controllers\Admin\Club\Actions\Show;
use App\Http\Controllers\Admin\Club\Actions\Store;
use App\Http\Controllers\Admin\Club\Actions\Update;
use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Models\Club;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClubCrudController
 *
 * @property-read CrudPanel $crud
 */
class ClubCrudController extends CrudController
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
        CRUD::setModel(Club::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/clubs');
        CRUD::setEntityNameStrings('club', 'clubs');
    }
}
