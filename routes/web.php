<?php

use App\Http\Controllers\MoradorController;
use App\Http\Middleware\UsuarioTemPermissao;
use App\Livewire\Ongs\CreateOng;
use App\Http\Controllers\OngController;
use App\Livewire\Comentario\ComentariosPendentes;
use App\Livewire\Morador\Create;
use App\Livewire\Morador\EditMorador;
use App\Livewire\Morador\ListarTodos;
use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Support\Facades\Route;
Route::view('/', 'welcome');

Route::get('dashboard', [MoradorController::class, 'index'])
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

        Route::get('/show/{id}', [MoradorController::class, 'show'])
        ->name('morador.show');

        Route::get('/all', ListarTodos::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.all');

        Route::get('/edit/{id}', Create::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.edit');

        Route::get('/destroy/{id}', [MoradorController::class,'destroy'])
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.destroy');
});


Route::get('/comentarios/pendentes', ComentariosPendentes::class)->name('comentarios.pendentes');
Route::get('/comentarios/aprovar/{id_comentario}', [ComentariosPendentes::class, 'aprovar'])->name('comentarios.pendentes.aprovar');
Route::get('/comentarios/excluir    /{id_comentario}', [ComentariosPendentes::class, 'excluir'])->name('comentarios.pendentes.excluir');

require __DIR__.'/auth.php';
