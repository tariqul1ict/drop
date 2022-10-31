<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('row', function () {
            return "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 row-cols-xxl-4 mb-4'>";
        });

        Blade::directive('endrow', function () {
            return "</div>";
        });
    }
}
