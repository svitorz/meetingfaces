<?php

use App\Http\Controllers\MoradorController;
use App\Http\Middleware\UsuarioTemPermissao;
use App\Livewire\Ongs\CreateOng;
use App\Http\Controllers\OngController;
use App\Livewire\Morador\Create;
use App\Livewire\Ongs\Dashboard;
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

        Route::get('/dashboard', [OngController::class,'index'])
        ->middleware(UsuarioTemPermissao::class . ':admin')
                ->name('ongs.dashboard');    
});

Route::prefix('/moradores')->middleware('auth')->group(function(){
    
    Route::get('/create', Create::class)
    ->middleware(UsuarioTemPermissao::class . ':admin')
    ->name('morador.create');

    Route::controller(MoradorController::class)->group(function(){
        Route::get('/show/{id}', 'show')
        ->name('morador.show');
    });
});

require __DIR__.'/auth.php';
