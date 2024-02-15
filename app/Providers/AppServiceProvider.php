<?php

namespace App\Providers;

use App\Singletons\FacebookApi;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {
        $this->app->singleton(FacebookApi::class, function () {
            return new FacebookApi();
        });
    }

    public function boot(): void {
        Paginator::useBootstrapFive();
    }
}
