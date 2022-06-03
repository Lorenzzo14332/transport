<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Giro;
use App\Models\Item;

use Illuminate\Support\Facades\DB;


class EMController extends Controller
{
    public function index()
    {
        $giro = Subcategoria::where('id', 75)
            ->first();

        $ems = DB::table('sedes_giros')
            ->join('items as mun', 'sedes_giros.sede_id', '=', 'mun.id')
            ->join('sub_categorias as dep', 'mun.sub_categoria_id', '=', 'dep.id')
            ->join('sub_categorias as te', 'sedes_giros.tipo_extaccion_id', '=', 'te.id')
            ->join('sub_categorias as cla', 'sedes_giros.clas_min_id', '=', 'cla.id')
            ->where('sedes_giros.planta_id', 75)
            ->get(
                [
                    'dep.nombre as departamento', 'mun.nombre as municipio',
                    'sedes_giros.id as id'
                ]);

        return view('frontend.pems.index', compact('giro', 'ems'));
    }

    public function municipios(Request $request)
    {
        $data['items'] = DB::table('items')->where("sub_categoria_id", $request->departamento)
            ->get(["nombre", "id"]);


        return response()->json($data);
    }


    public function create()
    {
        $deps = DB::table('sub_categorias')->where('categoria_id', 1)->get();
        $t_extacciones = DB::table('sub_categorias')->where('categoria_id', 4)->get();
        $clas = DB::table('sub_categorias')->where('categoria_id', 3)->get();

        return view('frontend.pems.create', compact('deps', 't_extacciones', 'clas'));
    }

    public function store(Request $request)
    {
        $ubicacion = new Giro;
        $ubicacion->planta_id = 75;
        $ubicacion->sede_id = $request->get('sede_id');
        $ubicacion->tipo_extaccion_id = $request->get('tipo_extaccion_id');
        $ubicacion->clas_min_id = $request->get('clas_min_id');
        $ubicacion->orden = $request->get('orden');
        $ubicacion->save();
        return redirect()->route('pems.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $deps = DB::table('sub_categorias')->where('categoria_id', 1)->get();
        $municipios = Item::all();
        $t_extacciones = DB::table('sub_categorias')->where('categoria_id', 4)->get();
        $clas = DB::table('sub_categorias')->where('categoria_id', 3)->get();
        $ubicacion = Giro::find($id);
        return view('frontend.pems.edit', compact('ubicacion', 'deps', 't_extacciones', 'clas', 'municipios'));

    }

   public function update(Request $request, $id)
    {
        $ubicacion = Giro::find($id);

        $ubicacion->orden = $request->input('orden');
        $ubicacion->sede_id = $request->input('sede_id');
        $ubicacion->planta_id = 75;
        $ubicacion->clas_min_id = $request->input('clas_min_id');
        $ubicacion->tipo_extaccion_id = $request->input('tipo_extaccion_id');

        $ubicacion->update();
        return redirect()->route('pems.index');

    }

    public function destroy($id)
    {
        //
    }
}
