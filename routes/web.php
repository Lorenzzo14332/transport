<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EMController;
use App\Http\Controllers\PprimasController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GiroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\GraficosController;

Route::get('/', function () {
    return view('frontend.layouts.template');

});

Route::post('municipios', [EMController::class, 'municipios'])->name('municipios');
Route::resource('pems', EMController::class);
Route::resource('primas', PprimasController::class);
Route::resource('items', ItemController::class);
Route::resource('giros', GiroController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('subcategorias', SubcategoriaController::class);
Route::post('minerales', [IngresoController::class, 'minerales'])->name('minerales');
Route::resource('ingresos', IngresoController::class);
Route::get('graficos', [GraficosController::class, 'index'])->name('graficos.index');