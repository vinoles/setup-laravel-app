<?php

namespace App\Providers;

use App\Models\User;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use L5Swagger\L5SwaggerServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->register(L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $appUrl = config('app.url');

        if ($appUrl) {
            URL::forceRootUrl($appUrl);
            $scheme = parse_url($appUrl, PHP_URL_SCHEME) ?: 'http';
            URL::forceScheme($scheme);
        }

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        Gate::define('viewPulse', function (User $user) {
            return $user->isAnyAdmin();
        });
    }
}
