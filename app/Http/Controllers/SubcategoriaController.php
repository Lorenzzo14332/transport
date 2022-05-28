<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcats = Subcategoria::get();
        return view('frontend.subcategoria.index', compact('subcats'));
    }

    public function create()
    {
        $categorias = Categoria::get();
        return view('frontend.subcategoria.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        Subcategoria::create($request->all());
        return redirect()->route('subcategorias.index');

    }

    public function show(Subcategoria $subcategoria)
    {
        return view('frontend.subcategoria.show', compact('categoria'));
    }

    public function edit(Subcategoria $subcategoria)
    {
        $categorias = Categoria::get();
        return view('frontend.subcategoria.edit', compact('subcategoria', 'categorias'));
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $subcategoria->update($request->all());
        return redirect()->route('subcategorias.index');

    }

    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return redirect()->route('subcategorias.index');
    }
}
