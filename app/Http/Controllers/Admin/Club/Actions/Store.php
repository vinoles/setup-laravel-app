<?php

namespace App\Http\Controllers\Admin\Club\Actions;

trait Store
{
    use Form;

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     *
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->fields();
    }
}
