<?php

use App\Http\Middleware\UsuarioTemPermissao;
use App\Livewire\Ongs\CreateOng;
use Illuminate\Support\Facades\Route;
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('/ongs')->group(function(){
    Route::get('/create', CreateOng::class)->middleware(['auth', UsuarioTemPermissao::class . ':comum'])->name('ongs.create');
});

require __DIR__.'/auth.php';
