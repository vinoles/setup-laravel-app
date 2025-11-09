<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\HasCrudLinks;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use UsesBackpackOperations;
    use HasCrudLinks;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/posts');
        CRUD::setEntityNameStrings('post', 'posts');
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
            'name' => 'title',
            'type' => 'text',
            'label' => __('admin.globals.title'),
        ]);

        CRUD::addColumn([
            'name' => 'slug',
            'type' => 'text',
            'label' => __('admin.globals.slug'),
        ]);

        CRUD::addColumn([
            'name' => 'content',
            'type' => 'textarea',
            'label' => __('admin.globals.content'),
        ]);

        CRUD::addColumn([
            'name' => 'published_at',
            'type' => 'datetime',
            'label' => __('admin.globals.published_at'),
        ]);

        CRUD::addColumn(self::linkColumn('author', User::class, 'full_name', 'users', ['first_name', 'last_name']));

        CRUD::addColumn([
            'name' => 'created_at',
            'type' => 'datetime',
            'label' => __('admin.globals.created_at'),
        ]);

        CRUD::addColumn([
            'name' => 'updated_at',
            'type' => 'datetime',
            'label' => __('admin.globals.updated_at'),
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
        CRUD::setValidation(PostRequest::class);

        CRUD::addField([
            'name' => 'title',
            'type' => 'text',
            'label' => __('admin.globals.title'),
        ]);

        CRUD::addField([
            'name' => 'content',
            'type' => 'textarea',
            'label' => __('admin.globals.content'),
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

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
