<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\PlayerRequest;
use App\Models\Player;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PlayerCrudController
 *
 * @property-read CrudPanel $crud
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
            'name'        => 'full_name',
            'label'       => __('admin.globals.full_name'),
            'searchLogic' => function ($query, $column, $searchTerm) {
                $this->applyTextSearch($query, 'first_name', $searchTerm);
                $this->applyTextSearch($query, 'last_name', $searchTerm);
            },
        ]);

        CRUD::addColumn([
            'name'        => 'nationality',
            'type'        => 'text',
            'label'       => __('admin.globals.nationality'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'nationality', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'position',
            'type'        => 'text',
            'label'       => __('admin.globals.position'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'position', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'birthdate',
            'type'        => 'date',
            'label'       => __('admin.globals.birthdate'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'birthdate', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'height_cm',
            'type'        => 'number',
            'label'       => __('admin.globals.height_cm'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'height_cm', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'weight_kg',
            'type'        => 'number',
            'label'       => __('admin.globals.weight_kg'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'weight_kg', $searchTerm),
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
