<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LeagueRequest;
use App\Models\Federation;
use App\Models\League;
use App\Models\Sport;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * @property-read CrudPanel $crud
 */
class LeagueCrudController extends CrudController
{
    use UsesBackpackOperations;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     */
    public function setup(): void
    {
        CRUD::setModel(League::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/leagues');
        CRUD::setEntityNameStrings('league', 'leagues');
    }

    /**
     * Define what happens when the List operation is loaded.
     */
    protected function setupListOperation(): void
    {
        CRUD::addColumn([
            'name' => 'name',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addColumn([
            'name' => 'country',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addColumn([
            'name' => 'federation_id',
            'label' => __('admin.globals.federation'),
            'type' => 'select',
            'entity' => 'federation',
            'attribute' => 'name',
            'model' => Federation::class,
        ]);

        CRUD::addColumn([
            'name' => 'sport_id',
            'label' => __('admin.globals.sport'),
            'type' => 'select',
            'entity' => 'sport',
            'attribute' => 'name',
            'model' => Sport::class,
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(LeagueRequest::class);

        CRUD::addField([
            'name' => 'name',
            'type' => 'text',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addField([
            'name' => 'country',
            'type' => 'text',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addField([
            'name' => 'sport_id',
            'type' => 'select',
            'label' => __('admin.globals.sport'),
            'entity' => 'sport',
            'model' => Sport::class,
            'attribute' => 'name',
            'options' => fn ($query) => $query->orderBy('name')->get(),
            'allows_null' => true,
        ]);

        CRUD::addField([
            'name' => 'federation_id',
            'type' => 'select',
            'label' => __('admin.globals.federation'),
            'entity' => 'federation',
            'model' => Federation::class,
            'attribute' => 'name',
            'options' => fn ($query) => $query->orderBy('name')->get(),
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
