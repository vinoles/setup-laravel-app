<?php

namespace App\Http\Controllers\Admin\User\Actions;

use App\Http\Requests\Admin\UserRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait Form
{
    /**
     * Define form fields users for operations
     *
     *
     * @return void
     */
    public function fields()
    {
        CRUD::setValidation(UserRequest::class);

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
            'name'  => 'email',
            'type'  => 'email',
            'label' => __('admin.globals.email'),
        ]);

        CRUD::addField([
            'name'  => 'phone',
            'type'  => 'text',
            'label' => __('admin.globals.phone'),
        ]);

        CRUD::addField([
            'name'  => 'address',
            'type'  => 'text',
            'label' => __('admin.globals.address'),
        ]);

        CRUD::addField([
            'name'  => 'city',
            'type'  => 'text',
            'label' => __('admin.globals.city'),
        ]);

        CRUD::addField([
            'name'  => 'country',
            'type'  => 'text',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addField([
            'name'  => 'postal_code',
            'type'  => 'text',
            'label' => __('admin.globals.postal_code'),
        ]);

        CRUD::addField([
            'name'  => 'birthdate',
            'type'  => 'date',
            'label' => __('admin.globals.birthdate'),
        ]);

        CRUD::addField([
            'name'  => 'password',
            'type'  => 'password',
            'label' => __('admin.globals.password'),
        ]);
    }
}
