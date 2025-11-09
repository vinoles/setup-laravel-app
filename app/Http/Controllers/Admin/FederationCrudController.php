<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\FederationRequest;
use App\Models\Federation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * @property-read CrudPanel $crud
 */
class FederationCrudController extends CrudController
{
    use UsesBackpackOperations;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     */
    public function setup(): void
    {
        CRUD::setModel(Federation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/federations');
        CRUD::setEntityNameStrings('federation', 'federations');
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
            'name' => 'acronym',
            'label' => __('admin.globals.acronym'),
        ]);

        CRUD::addColumn([
            'name' => 'type',
            'label' => __('admin.globals.type'),
        ]);

        CRUD::addColumn([
            'name' => 'country',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addColumn([
            'name' => 'foundation_year',
            'label' => __('admin.globals.foundation_year'),
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(FederationRequest::class);

        CRUD::addField([
            'name' => 'name',
            'type' => 'text',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addField([
            'name' => 'acronym',
            'type' => 'text',
            'label' => __('admin.globals.acronym'),
        ]);

        CRUD::addField([
            'name' => 'type',
            'type' => 'text',
            'label' => __('admin.globals.type'),
        ]);

        CRUD::addField([
            'name' => 'country',
            'type' => 'text',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addField([
            'name' => 'foundation_year',
            'type' => 'number',
            'label' => __('admin.globals.foundation_year'),
            'attributes' => [
                'min' => 1800,
                'max' => now()->year,
            ],
        ]);

        CRUD::addField([
            'name' => 'website',
            'type' => 'text',
            'label' => __('admin.globals.website'),
        ]);

        CRUD::addField([
            'name' => 'contact_email',
            'type' => 'email',
            'label' => __('admin.globals.contact_email'),
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
