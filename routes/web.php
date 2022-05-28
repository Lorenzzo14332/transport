<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;

Route::get('/', function () {
    return view('frontend.layouts.template');

});

Route::resource('categorias', CategoriaController::class);
Route::resource('subcategorias', SubcategoriaController::class);