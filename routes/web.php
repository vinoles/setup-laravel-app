<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redoc-api', function () {
    return view('redoc_api');
});

Route::get('/storage/redocapi', function () {
    $path = storage_path("api-docs/api-docs.json");

    return response()->file($path);
})->name('storage_rerdoc');
