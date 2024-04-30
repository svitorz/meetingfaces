<?php

namespace App\Providers;

use App\Models\Ong;
use App\Observers\OngObserver;
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
        Ong::observe(OngObserver::class);
    }
}
