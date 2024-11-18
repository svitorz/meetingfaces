<?php

use App\Http\Controllers\MoradorController;
use App\Http\Controllers\OngController;
use App\Http\Middleware\UsuarioTemPermissao;
use App\Livewire\Morador\CreateMorador;
use App\Livewire\Morador\ListarTodos;
use App\Livewire\Morador\Show;
use App\Livewire\Ongs\Admin\Dashboard as AdminDashboard;
use App\Livewire\Ongs\CreateOng;
use App\Livewire\Ongs\Doacao;
use App\Livewire\SobreNos;
use App\Livewire\Somenos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('dashboard', [MoradorController::class, 'index'])
    // ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/sobre-nos', SobreNos::class)->name('sobre_nos');
Route::get('/some-nos', Somenos::class)->name('some_nos');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('/ongs')->group(function () {
    Route::get('/create', CreateOng::class)->middleware(['auth', UsuarioTemPermissao::class . ':comum'])->name('ongs.create');

    Route::post('/store', [OngController::class, 'store'])
        ->middleware(['auth', UsuarioTemPermissao::class . ':comum'])
        ->name('ongs.store');

    Route::get('/edit/{id}', CreateOng::class)
        ->middleware(['auth', UsuarioTemPermissao::class . ':admin'])
        ->name('ongs.edit');

    Route::get('/dashboard', AdminDashboard::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('ongs.dashboard');

    Route::get('/doacao', Doacao::class)->name('ongs.doacao');

    Route::get('/show/{id}', \App\Livewire\Ongs\Show::class)->middleware(['auth'])->name('ongs.show');

    Route::post('/destroy/{ong}', [OngController::class, 'destroy'])
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('ongs.destroy');
});

Route::prefix('/moradores')->middleware('auth')->group(function () {

    Route::get('/create', CreateMorador::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.create');

    Route::post('/store', [MoradorController::class, 'create'])
        ->name('morador.store');

    Route::get('/show/{morador}', [MoradorController::class, 'show'])
        ->name('morador.show');

    Route::get('/all', ListarTodos::class)
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.all');

    Route::get('/edit/{morador}', [MoradorController::class, 'edit'])
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.edit');

    Route::put('/update/{morador}', [MoradorController::class, 'update'])
        ->name('morador.update');

    Route::get('/destroy/{morador}', [MoradorController::class, 'destroy'])
        ->middleware(UsuarioTemPermissao::class . ':admin')
        ->name('morador.destroy');

    Route::get('/find', [MoradorController::class, 'find'])
        ->name('morador.find');
});

require __DIR__ . '/auth.php';
