<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PlayerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PlayerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PlayerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Player::class);
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
        CRUD::column('uuid');
        CRUD::column('full_name')->label('Name');
        CRUD::column('nationality');
        CRUD::column('position');
        CRUD::column('birthdate')->type('date');
        CRUD::column('height_cm');
        CRUD::column('weight_kg');

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
        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::field([
            'name' => 'first_name',
            'label' => __('admin.globals.first_name'),
        ]);
        CRUD::field([
            'name' => 'last_name',
            'label' => __('admin.globals.last_name'),
        ]);
        CRUD::field([
            'name' => 'birthdate',
            'label' => __('admin.globals.birthdate'),
        ]);
        CRUD::field([
            'name' => 'nationality',
            'label' => __('admin.globals.nationality'),
        ]);
        CRUD::field([
            'name' => 'position',
            'label' => __('admin.globals.position'),
        ]);
        CRUD::field([
            'name' => 'height_cm',
            'label' => __('admin.globals.height_cm'),
        ]);
        CRUD::field([
            'name' => 'weight_kg',
            'label' => __('admin.globals.weight_kg'),
        ]);
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
