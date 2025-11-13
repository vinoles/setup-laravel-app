<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 *
 * @property-read CrudPanel $crud
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

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     *
     * @return void
     */
    protected function setupCreateOperation()
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

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     *
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
