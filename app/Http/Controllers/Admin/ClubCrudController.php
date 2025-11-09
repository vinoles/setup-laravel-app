<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\ClubRequest;
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

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     *
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name'        => 'name',
            'type'        => 'text',
            'label'       => __('admin.globals.name'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'name', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'address',
            'type'        => 'text',
            'label'       => __('admin.globals.address'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'address', $searchTerm),
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     *
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ClubRequest::class);

        CRUD::addField([
            'name'  => 'name',
            'type'  => 'text',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addField([
            'name'  => 'address',
            'type'  => 'text',
            'label' => __('admin.globals.address'),
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     *
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
