<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redoc-api', function () {
    return view('redoc_api');
});

Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path("app/public/$filename");

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
});
