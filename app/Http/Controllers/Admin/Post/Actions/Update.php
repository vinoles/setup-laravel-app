<?php

namespace App\Http\Controllers\Admin\Post\Actions;

trait Update
{
    use Form;

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     *
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->fields();
    }
}

