<?php

use App\Http\Controllers\Admin\Club\ClubCrudController;
use App\Http\Controllers\Admin\Post\PostCrudController;
use App\Http\Controllers\Admin\User\UserCrudController;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'as'         => 'admin.',
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
], function () { // custom admin routes
    Route::crud('users', UserCrudController::class);
    Route::crud('clubs', ClubCrudController::class);
    Route::crud('posts', PostCrudController::class);
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
