<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\PlayerRequest;
use App\Models\Player;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PlayerCrudController
 * @package App\Http\Controllers\Admin
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
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'uuid',
        ]);

        CRUD::addColumn([
            'name' => 'full_name',
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
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PlayerRequest::class);

        CRUD::field('first_name')->label(__('admin.globals.first_name'));
        CRUD::field('last_name')->label(__('admin.globals.last_name'));
        CRUD::field('birthdate')->label(__('admin.globals.birthdate'));
        CRUD::field('nationality')->label(__('admin.globals.nationality'));
        CRUD::field('position')->label(__('admin.globals.position'));
        CRUD::field('height_cm')->label(__('admin.globals.height_cm'));
        CRUD::field('weight_kg')->label(__('admin.globals.weight_kg'));

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
