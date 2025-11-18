<?php

namespace App\Http\Controllers\Admin\Club\Actions;

use App\Http\Requests\Admin\ClubRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait Form
{
    /**
     * Define form fields clubs for operations
     *
     *
     * @return void
     */
    public function fields()
    {
        CRUD::setValidation(ClubRequest::class);

        CRUD::addField([
            'name'  => 'name',
            'type'  => 'text',
            'label' => __('admin.globals.name'),
        ]);

        CRUD::addField([
            'name'  => 'address',
            'type'  => 'text',
            'label' => __('admin.globals.address'),
        ]);
    }
}
