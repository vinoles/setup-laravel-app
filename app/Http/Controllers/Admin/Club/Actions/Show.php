<?php

namespace App\Http\Controllers\Admin\Club\Actions;

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
            'name'  => 'name',
            'type'  => 'text',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addColumn([
            'name'  => 'address',
            'type'  => 'text',
            'label' => __('admin.globals.address'),
        ]);
    }
}
