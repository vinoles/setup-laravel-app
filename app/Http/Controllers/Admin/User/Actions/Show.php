<?php

namespace App\Http\Controllers\Admin\User\Actions;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait Show
{
    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     *
     * @return void
     */
    protected function setupShowOperation()
    {
        CRUD::addColumn([
            'name'  => 'full_name',
            'label' => __('admin.globals.full_name'),
        ]);

        CRUD::addColumn([
            'name'  => 'email',
            'type'  => 'email',
            'label' => __('admin.globals.email'),
        ]);

        CRUD::addColumn([
            'name'  => 'phone',
            'type'  => 'text',
            'label' => __('admin.globals.phone'),
        ]);

        CRUD::addColumn([
            'name'  => 'address',
            'type'  => 'text',
            'label' => __('admin.globals.address'),
        ]);

        CRUD::addColumn([
            'name'  => 'city',
            'type'  => 'text',
            'label' => __('admin.globals.city'),
        ]);

        CRUD::addColumn([
            'name'  => 'country',
            'type'  => 'text',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addColumn([
            'name'  => 'postal_code',
            'type'  => 'text',
            'label' => __('admin.globals.postal_code'),
        ]);

        CRUD::addColumn([
            'name'  => 'birthdate',
            'type'  => 'date',
            'label' => __('admin.globals.birthdate'),
        ]);

        CRUD::addColumn([
            'name'  => 'created_at',
            'type'  => 'datetime',
            'label' => __('admin.globals.created_at'),
        ]);
    }
}
