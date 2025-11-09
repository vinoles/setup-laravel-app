<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\Club;
use App\Models\Team;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeamCrudController
 *
 * @property-read CrudPanel $crud
 */
class TeamCrudController extends CrudController
{
    use UsesBackpackOperations;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Team::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/teams');
        CRUD::setEntityNameStrings('team', 'teams');
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
            'name' => 'name',
        ]);

        CRUD::addColumn([
            'name' => 'short_name',
        ]);

        CRUD::addColumn([
            'name' => 'city',
        ]);

        CRUD::addColumn(
            self::linkColumn('club', Club::class, 'name', 'clubs', ['name'])
        );
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
        CRUD::setValidation(TeamRequest::class);

        CRUD::addField([
            'name'  => 'name',
            'type'  => 'text',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addField([
            'name'  => 'short_name',
            'type'  => 'text',
            'label' => __('admin.globals.short_name'),
        ]);

        CRUD::addField([
            'name'  => 'city',
            'type'  => 'text',
            'label' => __('admin.globals.city'),
        ]);

        CRUD::addField([
            'name'  => 'logo_path',
            'type'  => 'text',
            'label' => __('admin.globals.logo_path'),
        ]);

        CRUD::addField([
            'name'      => 'club_id',
            'type'      => 'select',
            'entity'    => 'club',
            'model'     => Club::class,
            'attribute' => 'name',
            'label'     => __('admin.globals.club'),
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
