<?php

use App\Http\Controllers\MoradorController;
use App\Http\Middleware\UsuarioTemPermissao;
use App\Livewire\Morador\Show;
use App\Livewire\Ongs\CreateOng;
use App\Http\Controllers\OngController;
use App\Livewire\Comentario\ComentariosPendentes;
use App\Livewire\Morador\CreateMorador;
use App\Livewire\Morador\EditMorador;
use App\Livewire\Morador\ListarTodos;
use App\Livewire\Ongs\Doacao;
use App\Livewire\SobreNos;
use App\Livewire\Somenos;
use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('dashboard', [MoradorController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/sobre-nos', SobreNos::class)->name('sobre_nos');
Route::get('/some-nos', Somenos::class)->name('some_nos');
Route::get('/fale-conosco', function () {
    return "FALE CONOSCO"
})->name('fale_conosco');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('/ongs')->group(function () {
    Route::get('/create', CreateOng::class)
        ->middleware(['auth', UsuarioTemPermissao::class . ':comum'])
        ->name('ongs.create');

    Route::post('/store', [OngController::class, 'store'])
        ->middleware(['auth', UsuarioTemPermissao::class . ':comum'])
        ->name('ongs.store');
    Route::get('/dashboard', [OngController::class, 'index'])
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('ongs.dashboard');

    Route::get('/doacao', Doacao::class)->name('ongs.doacao');

    Route::get('/show/{id}', \App\Livewire\Ongs\Show::class)->middleware(['auth'])->name('ongs.show');
});

Route::prefix('/moradores')->middleware('auth')->group(function () {

    Route::get('/create', CreateMorador::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.create');

    Route::get('/show/{id}', Show::class)
        ->name('morador.show');

    Route::get('/all', ListarTodos::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.all');

    Route::get('/edit/{id}', CreateMorador::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.edit');

    Route::get('/destroy/{id}', [MoradorController::class, 'destroy'])
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.destroy');

    Route::get('/find', [MoradorController::class, 'find'])
        ->name('morador.find');
});

Route::prefix('/comentarios')->group(function () {
    Route::get('/pendentes', ComentariosPendentes::class)->name('comentarios.pendentes');
    Route::get('/aprovar/{id_comentario}', [ComentariosPendentes::class, 'aprovar'])->name('comentarios.pendentes.aprovar');
    Route::get('/excluir/{id_comentario}', [ComentariosPendentes::class, 'excluir'])->name('comentarios.pendentes.excluir');
});

require __DIR__ . '/auth.php';
