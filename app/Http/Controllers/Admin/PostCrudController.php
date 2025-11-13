<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\UsesBackpackOperations;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 *
 * @property-read CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use UsesBackpackOperations;

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
     *
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name'        => 'title',
            'type'        => 'text',
            'label'       => __('admin.globals.title'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'title', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'slug',
            'type'        => 'text',
            'label'       => __('admin.globals.slug'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'slug', $searchTerm),
        ]);

        CRUD::addColumn([
            'name'        => 'content',
            'type'        => 'textarea',
            'label'       => __('admin.globals.content'),
            'searchLogic' => fn ($query, $column, $searchTerm) => $this->applyTextSearch($query, 'content', $searchTerm),
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

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     *
     * @return void
     */
    protected function setupCreateOperation()
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

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     *
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
