<?php

use App\Http\Middleware\UsuarioTemPermissao;
use App\Livewire\Ongs\CreateOng;
use App\Http\Controllers\OngController;
use Illuminate\Support\Facades\Route;
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('/ongs')->group(function(){   
    Route::get('/create', CreateOng::class)
        ->middleware(['auth', UsuarioTemPermissao::class . ':comum'])
        ->name('ongs.create');

    Route::controller(OngController::class)->middleware(UsuarioTemPermissao::class . ':admin')->group(function(){
        Route::get('/dashboard', 'index')
                ->name('ongs.dashboard');    
    });
});

require __DIR__.'/auth.php';
