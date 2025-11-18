<?php

namespace App\Http\Controllers\Admin\Post\Actions;

use App\Models\User;
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
            'name'  => 'title',
            'type'  => 'text',
            'label' => __('admin.globals.title'),
        ]);

        CRUD::addColumn([
            'name'  => 'slug',
            'type'  => 'text',
            'label' => __('admin.globals.slug'),
        ]);

        CRUD::addColumn([
            'name'  => 'content',
            'type'  => 'textarea',
            'label' => __('admin.globals.content'),
        ]);

        CRUD::addColumn([
            'name'  => 'published_at',
            'type'  => 'datetime',
            'label' => __('admin.globals.published_at'),
        ]);

        CRUD::addColumn(
            $this->linkColumn('author', User::class, 'full_name', 'users', ['first_name', 'last_name'])
        );

        CRUD::addColumn([
            'name'  => 'created_at',
            'type'  => 'datetime',
            'label' => __('admin.globals.created_at'),
        ]);

        CRUD::addColumn([
            'name'  => 'updated_at',
            'type'  => 'datetime',
            'label' => __('admin.globals.updated_at'),
        ]);
    }
}

