<?php

use App\Http\Controllers\CaixaController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\FluxoController;
use App\Http\Controllers\MovimentoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('home');});
Route::get('dashboard', function () {return view('dashboard');});


Route::group(['prefix' => 'centros'], function() {
    Route::get('/', [CentroController::class, 'index'])->name('centros.index');
    Route::get('/create', [CentroController::class, 'create'])->name('centros.create');
    Route::get('/edit/{id}', [CentroController::class, 'edit'])->name('centros.edit');
    Route::post('/store', [CentroController::class, 'store'])->name('centros.store');
    Route::post('/update', [CentroController::class, 'update'])->name('centros.update');
    Route::get('/delete/{id}', [CentroController::class, 'destroy'])->name('centros.delete');
    Route::get('/details/{id}', [CentroController::class, 'details'])->name('centros.details');
});

Route::group(['prefix' => 'contas'], function() {
    Route::get('/', [ContaController::class, 'index'])->name('contas.index');
    Route::get('/create', [ContaController::class, 'create'])->name('contas.create');
    Route::get('/edit/{id}', [ContaController::class, 'edit'])->name('contas.edit');
    Route::post('/store', [ContaController::class, 'store'])->name('contas.store');
    Route::post('/update', [ContaController::class, 'update'])->name('contas.update');
    Route::get('/delete/{id}', [ContaController::class, 'destroy'])->name('contas.delete');
    Route::get('/details/{id}', [ContaController::class, 'details'])->name('contas.details');
});

Route::group(['prefix' => 'fluxos'], function() {
    Route::get('/', [FluxoController::class, 'index'])->name('fluxos.index');
    Route::get('/create', [FluxoController::class, 'create'])->name('fluxos.create');
    Route::get('/edit/{id}', [FluxoController::class, 'edit'])->name('fluxos.edit');
    Route::post('/store', [FluxoController::class, 'store'])->name('fluxos.store');
    Route::post('/update', [FluxoController::class, 'update'])->name('fluxos.update');
    Route::get('/delete/{id}', [FluxoController::class, 'destroy'])->name('fluxos.delete');
    Route::get('/details/{id}', [FluxoController::class, 'details'])->name('fluxos.details');
});


Route::group(['prefix' => 'movimentos'], function() {
    Route::get('/', [MovimentoController::class, 'index'])->name('movimentos.index');
    Route::get('/create', [MovimentoController::class, 'create'])->name('movimentos.create');
    Route::get('/edit/{id}', [MovimentoController::class, 'edit'])->name('movimentos.edit');
    Route::post('/store', [MovimentoController::class, 'store'])->name('movimentos.store');
    Route::post('/update', [MovimentoController::class, 'update'])->name('movimentos.update');
    Route::get('/delete/{id}', [MovimentoController::class, 'destroy'])->name('movimentos.delete');
    Route::get('/details/{id}', [MovimentoController::class, 'details'])->name('movimentos.details');
    Route::post('/search', [MovimentoController::class, 'search'])->name('movimentos.search');
    Route::get('/manager', [MovimentoController::class, 'manager'])->name('movimentos.manager');
    Route::get('/searchManager', [MovimentoController::class, 'searchManager'])->name('movimentos.searchManager');
   
});


Route::group(['prefix' => 'caixas'], function() {
    Route::get('/', [CaixaController::class, 'index'])->name('caixas.index');
    Route::get('/create', [CaixaController::class, 'create'])->name('caixas.create');
    Route::get('/edit/{id}', [CaixaController::class, 'edit'])->name('caixas.edit');
    Route::post('/store', [CaixaController::class, 'store'])->name('caixas.store');
    Route::post('/update', [CaixaController::class, 'update'])->name('caixas.update');
    Route::get('/delete/{id}', [CaixaController::class, 'destroy'])->name('caixas.delete');
    Route::get('/details/{id}', [CaixaController::class, 'details'])->name('caixas.details');
    Route::post('/search', [CaixaController::class, 'search'])->name('caixas.search');
});



