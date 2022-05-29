<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GiroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;

Route::get('/', function () {
    return view('frontend.layouts.template');

});

Route::resource('items', ItemController::class);
Route::resource('giros', GiroController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('subcategorias', SubcategoriaController::class);