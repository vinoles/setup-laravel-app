<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
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
            'name'        => 'name',
            'type'        => 'text',
            'label'       => __('admin.globals.name'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'name', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'country',
            'type'        => 'text',
            'label'       => __('admin.globals.country'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'country', $searchTerm),
        ]);

        CRUD::addColumn(
            $this->linkColumn('federation', Federation::class, 'name', 'federations', ['name'])
        );

        CRUD::addColumn([
            'name'        => 'sport_id',
            'label'       => __('admin.globals.sport'),
            'type'        => 'select',
            'entity'      => 'sport',
            'attribute'   => 'name',
            'model'       => Sport::class,
            'searchLogic' => $this->relationSearchLogic('sport', ['name']),
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(LeagueRequest::class);

        CRUD::addField([
            'name'  => 'name',
            'type'  => 'text',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addField([
            'name'  => 'country',
            'type'  => 'text',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addField([
            'name'        => 'sport_id',
            'type'        => 'select',
            'label'       => __('admin.globals.sport'),
            'entity'      => 'sport',
            'model'       => Sport::class,
            'attribute'   => 'name',
            'options'     => fn ($query) => $query->orderBy('name')->get(),
            'allows_null' => true,
        ]);

        CRUD::addField([
            'name'      => 'federation_id',
            'type'      => 'select',
            'label'     => __('admin.globals.federation'),
            'entity'    => 'federation',
            'model'     => Federation::class,
            'attribute' => 'name',
            'options'   => fn ($query) => $query->orderBy('name')->get(),
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
