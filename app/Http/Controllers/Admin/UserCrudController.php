<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use UsesBackpackOperations;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'full_name',
            'label' => __('admin.globals.full_name'),
        ]);

        CRUD::addColumn([
            'name' => 'email',
            'label' => __('admin.globals.email'),
        ]);

        CRUD::addColumn([
            'name' => 'phone',
            'label' => __('admin.globals.phone'),
        ]);

        CRUD::addColumn([
            'name' => 'city',
            'label' => __('admin.globals.city'),
        ]);

        CRUD::addColumn([
            'name' => 'country',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addColumn([
            'name' => 'birthdate',
            'type' => 'date',
            'label' => __('admin.globals.birthdate'),
        ]);

        CRUD::addColumn([
            'name' => 'created_at',
            'type' => 'datetime',
            'label' => __('admin.globals.created_at'),
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::addField([
            'name' => 'first_name',
            'type' => 'text',
            'label' => __('admin.globals.first_name'),
        ]);

        CRUD::addField([
            'name' => 'last_name',
            'type' => 'text',
            'label' => __('admin.globals.last_name'),
        ]);

        CRUD::addField([
            'name' => 'email',
            'type' => 'email',
            'label' => __('admin.globals.email'),
        ]);

        CRUD::addField([
            'name' => 'phone',
            'type' => 'text',
            'label' => __('admin.globals.phone'),
        ]);

        CRUD::addField([
            'name' => 'address',
            'type' => 'text',
            'label' => __('admin.globals.address'),
        ]);

        CRUD::addField([
            'name' => 'city',
            'type' => 'text',
            'label' => __('admin.globals.city'),
        ]);

        CRUD::addField([
            'name' => 'country',
            'type' => 'text',
            'label' => __('admin.globals.country'),
        ]);

        CRUD::addField([
            'name' => 'postal_code',
            'type' => 'text',
            'label' => __('admin.globals.postal_code'),
        ]);

        CRUD::addField([
            'name' => 'birthdate',
            'type' => 'date',
            'label' => __('admin.globals.birthdate'),
        ]);

        CRUD::addField([
            'name' => 'password',
            'type' => 'password',
            'label' => __('admin.globals.password'),
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
