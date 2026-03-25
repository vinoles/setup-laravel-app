<?php

namespace App\Http\Controllers\Admin\Club\Actions;

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
            'name'        => 'name',
            'type'        => 'text',
            'label'       => __('admin.globals.name'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'name', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'address',
            'type'        => 'text',
            'label'       => __('admin.globals.address'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'address', $searchTerm),
        ]);
    }
}
