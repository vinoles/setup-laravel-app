<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
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
        // CRUD::setFromDb(); // set columns from db columns.

        CRUD::column('id')
            ->type('text')
            ->label(__('#'));

        CRUD::column('title')
            ->type('text')
            ->label(__('admin.globals.title'));

        CRUD::column('slug')
            ->type('text')
            ->label(__('admin.globals.slug'));

        CRUD::column('content')
            ->type('textarea')
            ->label(__('admin.globals.content'));

        CRUD::column('published_at')
            ->type('datetime')
            ->label(__('admin.globals.published_at'));

        // TODO: Consider refactoring in the future
        CRUD::column('author_id')
            ->type('select')
            ->model('App\Models\User')
            ->attribute('full_name')
            ->entity('author')
            ->searchLogic(function ($query, $column, $searchTerm) {
                $query->orWhereHas('author', function ($q) use ($searchTerm) {
                    $q->whereRaw('(LOWER(first_name) LIKE ? OR LOWER(last_name) LIKE ?)', [
                        '%' . strtolower($searchTerm) . '%',
                        '%' . strtolower($searchTerm) . '%',
                    ]);
                });
            });

        CRUD::column('created_at')
            ->type('datetime')
            ->label(__('admin.globals.created_at'));

        CRUD::column('updated_at')
            ->type('datetime')
            ->label(__('admin.globals.updated_at'));

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
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
        // CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name' => 'title',
            'type' => 'text',
            'label' => __('admin.globals.title'),
        ]);

        CRUD::field([
            'name' => 'content',
            'type' => 'textarea',
            'label' => __('admin.globals.content'),
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
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
