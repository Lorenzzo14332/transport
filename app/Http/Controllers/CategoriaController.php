<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();  
        return view('frontend.categoria.index', compact('categorias'));
    }
    
    public function create()
    {
        return view('frontend.categoria.create');
    }

    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    public function show(Categoria $categoria)
    {
        return view('frontend.categoria.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('frontend.categoria.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
