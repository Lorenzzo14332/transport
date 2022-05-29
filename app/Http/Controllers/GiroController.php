<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Categoria;
use App\Models\Subcategoria;

class GiroController extends Controller
{
    public function index()
    {
        $categoria = Categoria::where('id', 8)
        ->first();
        
        $giros = Subcategoria::where(
            [
                'categoria_id'=> 8,
                'estado'      => 1
            ])
                ->orderBy('nombre')
                ->get();
        return view('frontend.giros.index', compact('giros', 'categoria'));

    }
    
    public function create()
    {
        return view('frontend.giros.create');
    }

    public function store(Request $request)
    {
        $giro = new Subcategoria;
        $giro->categoria_id = 8;
        $giro->nombre = $request->get('nombre');
        $giro->estado = 1;
        $giro->save();
        return redirect()->route('giros.index');
    }

    public function show(Subcategoria $giro)
    {
        
    }

    public function edit(Subcategoria $giro)
    {
        return view('frontend.giros.edit', compact('giro'));
    }

    public function update(Request $request, Subcategoria $giro)
    {
        $giro->update($request->all());
        return redirect()->route('giros.index');
    }

    public function destroy(Subcategoria $giro)
    {
        $giro->delete();
        return redirect()->route('giros.index');
    }
}
