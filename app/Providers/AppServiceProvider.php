<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // The admin theme (and the campaign list pagination) is built on
        // Bootstrap 5, so render paginators using Bootstrap-styled links.
        Paginator::useBootstrapFive();
    }
}
