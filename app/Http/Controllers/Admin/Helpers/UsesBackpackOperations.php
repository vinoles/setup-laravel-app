<?php

namespace App\Http\Controllers\Admin\Helpers;

use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

trait UsesBackpackOperations
{
    use CreateOperation;
    use DeleteOperation;
    use HasCrudLinks;
    use ListOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;
}
