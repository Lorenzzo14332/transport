<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get();
        return view('frontend.item.index', compact('items'));
    }
    public function create()
    {
        $subcategorias = Subcategoria::where('categoria_id', 1)->get();
        return view('frontend.item.create', compact('subcategorias'));
    }
    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->route('items.index');
    }
    public function show(Item $item)
    {
        return view('frontend.item.show', compact('item'));
    }
    public function edit(Item $item)
    {
        $subcategorias = Subcategoria::get();
        return view('frontend.item.edit', compact('subcategorias', 'item'));
    }
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());
        return redirect()->route('items.index');
    }
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
