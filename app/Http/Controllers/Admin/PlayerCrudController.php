<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\PlayerRequest;
use App\Models\Player;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PlayerCrudController
 *
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PlayerCrudController extends CrudController
{
    use UsesBackpackOperations;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Player::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/players');
        CRUD::setEntityNameStrings('player', 'players');
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
            'name'  => 'full_name',
            'label' => 'Name',
        ]);

        CRUD::addColumn([
            'name' => 'nationality',
        ]);

        CRUD::addColumn([
            'name' => 'position',
        ]);

        CRUD::addColumn([
            'name' => 'birthdate',
            'type' => 'date',
        ]);

        CRUD::addColumn([
            'name' => 'height_cm',
        ]);

        CRUD::addColumn([
            'name' => 'weight_kg',
        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
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
        CRUD::setValidation(PlayerRequest::class);

        CRUD::addField([
            'name'  => 'first_name',
            'type'  => 'text',
            'label' => __('admin.globals.first_name'),
        ]);

        CRUD::addField([
            'name'  => 'last_name',
            'type'  => 'text',
            'label' => __('admin.globals.last_name'),
        ]);

        CRUD::addField([
            'name'  => 'birthdate',
            'type'  => 'date',
            'label' => __('admin.globals.birthdate'),
        ]);

        CRUD::addField([
            'name'  => 'nationality',
            'type'  => 'text',
            'label' => __('admin.globals.nationality'),
        ]);

        CRUD::addField([
            'name'  => 'position',
            'type'  => 'text',
            'label' => __('admin.globals.position'),
        ]);

        CRUD::addField([
            'name'  => 'height_cm',
            'type'  => 'number',
            'label' => __('admin.globals.height_cm'),
        ]);

        CRUD::addField([
            'name'  => 'weight_kg',
            'type'  => 'number',
            'label' => __('admin.globals.weight_kg'),
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
