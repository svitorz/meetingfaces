<?php

namespace App\Providers;

use App\Observers\OngObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\{User, Morador, Ong};
use Illuminate\Support\Facades\Gate;

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

        Gate::define('manterMorador', function (User $user, Morador $morador) {
            return $user->id === $morador->ong->id_usuario && $user->permissao === "admin";
        });

        Gate::define('manterOng', function (User $user, Ong $ong) {
            return $user->id === $ong->id_usuario && $user->permissao === "admin";
        });
    }
}
