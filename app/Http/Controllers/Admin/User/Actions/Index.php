<?php

namespace App\Http\Controllers\Admin\User\Actions;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait Index
{
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
            'name'        => 'email',
            'type'        => 'email',
            'label'       => __('admin.globals.email'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'email', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'phone',
            'type'        => 'text',
            'label'       => __('admin.globals.phone'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'phone', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'city',
            'type'        => 'text',
            'label'       => __('admin.globals.city'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'city', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'country',
            'type'        => 'text',
            'label'       => __('admin.globals.country'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'country', $searchTerm),
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

