<?php

namespace App\Http\Controllers\Admin\Post\Actions;

use App\Http\Requests\Admin\PostRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait Form
{
    /**
     * Define form fields posts for operations
     *
     *
     * @return void
     */
    public function fields()
    {
        CRUD::setValidation(PostRequest::class);

        CRUD::addField([
            'name'  => 'title',
            'type'  => 'text',
            'label' => __('admin.globals.title'),
        ]);

        CRUD::addField([
            'name'  => 'content',
            'type'  => 'textarea',
            'label' => __('admin.globals.content'),
        ]);
    }
}
