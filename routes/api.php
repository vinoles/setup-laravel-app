<?php

use App\Http\Controllers\Api\Fortify\User\ConfirmPasswordController;
use App\Http\Controllers\Api\Fortify\Auth\LoginController;
use App\Http\Controllers\Api\Fortify\Auth\RegisterController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;



Route::middleware('auth:sanctum')->group(static function () {
    JsonApiRoute::server('v1')
        ->prefix('v1')
        ->name('v1.api.')
        ->resources(static function (ResourceRegistrar $server) {

            $server->resource('users', UserController::class);

            Route::prefix('users')->group(static function () {
                Route::post('confirm-password/{user}', ConfirmPasswordController::class)
                    ->name('user.password.confirm');
            });
        });
});

JsonApiRoute::server('v1')
    ->prefix('v1/auth')
    ->resources(static function () {
        Route::post('login', LoginController::class)->name('api.auth.login');
        Route::post('register', RegisterController::class)->name('api.auth.register');
    });
