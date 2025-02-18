<?php

use App\Http\Controllers\Api\Fortify\User\ConfirmPasswordController;
use App\Http\Controllers\Api\Fortify\Auth\LoginController;
use App\Http\Controllers\Api\Fortify\Auth\LogoutController;
use App\Http\Controllers\Api\Fortify\Auth\NewPasswordResetController;
use App\Http\Controllers\Api\Fortify\Auth\PasswordResetLinkController;
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

            Route::prefix('auth')->group(static function () {
                Route::post('logout', LogoutController::class)->name('auth.logout');
            });
        });
});

// auth routes
JsonApiRoute::server('v1')
    ->prefix('v1/auth')
    ->resources(static function () {
        Route::post('login', LoginController::class)
            ->name('api.auth.login');

        Route::post('register', RegisterController::class)
            ->name('api.auth.register');

        Route::post('forgot-password', PasswordResetLinkController::class)
            ->name('api.auth.forgot_password');

        Route::post('reset-password', NewPasswordResetController::class)
            ->name('api.auth.reset_password');
    });
