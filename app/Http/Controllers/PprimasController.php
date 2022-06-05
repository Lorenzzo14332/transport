<?php

namespace App\Http\Controllers;


use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Giro;
use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PprimasController extends Controller
{

    public function index()
    {
        $giro = Subcategoria::where('id', 76)
            ->first();

        $primas = DB::table('sedes_giros')
            ->join('items as mun', 'sedes_giros.sede_id', '=', 'mun.id')
            ->join('sub_categorias as dep', 'mun.sub_categoria_id', '=', 'dep.id')
            /* ->join('sub_categorias as te', 'sedes_giros.tipo_extaccion_id', '=', 'te.id')
            ->join('sub_categorias as cla', 'sedes_giros.clas_min_id', '=', 'cla.id') */
            ->where('sedes_giros.planta_id', 76)
            ->get(
                [
                    'dep.nombre as departamento', 'mun.nombre as municipio',
                    'sedes_giros.id as id'
                ]);

        return view('frontend.primas.index', 
                [
                    'primas'=>$primas,
                    'giro'=> $giro

                ]
    
    );
    }

    public function create()
    {
        $deps = DB::table('sub_categorias')->where('categoria_id', 1)->get();
       
        return view('frontend.primas.create',
        [
            'deps'=>$deps
        ]
    );
    }

    public function store(Request $request)
    {
       
        $ubicacion = new Giro;
        $ubicacion->planta_id = 76;
        $ubicacion->sede_id = $request->get('sede_id');
        $ubicacion->orden = $request->get('orden');
        $ubicacion->save();
        return redirect()->route('primas.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $deps = DB::table('sub_categorias')->where('categoria_id', 1)->get();
         $municipios = Item::all();
        $ubicacion = Giro::find($id);
        return view('frontend.primas.edit', [
            'ubicacion' => $ubicacion, 
            'deps'=> $deps,
            'municipios'=>$municipios]);

    }

    public function update(Request $request, $id)
    {
        $ubicacion = Giro::find($id);

        $ubicacion->orden = $request->input('orden');
        $ubicacion->sede_id = $request->input('sede_id');
        $ubicacion->planta_id = 76;
        $ubicacion->update();
        return redirect()->route('primas.index');

    }

    public function destroy($id)
    {
        $ubicacion = Giro::find($id);
        
        $ubicacion->delete();
        return redirect()->route('primas.index');

    }

}
