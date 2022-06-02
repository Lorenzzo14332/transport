<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giro;
use App\Models\Ingreso;
use App\Models\DIngreso;
use App\Models\Categoria;
use App\Models\Subcategoria;

use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        $pminerias = Ingreso::where('sede_id', 1)->get();
        return view(
            'frontend.pems.ingresos.index',
            [
                'pminerias' => $pminerias
            ]
        );
    }

    public function minerales(Request $request)
    {
        $data['minerales'] = Subcategoria::where("categoria_id", $request->t_mineral)
            ->get(["nombre", "id"]);
        return response()->json($data);
    }


    public function create()
    {

        $sede = DB::table('sedes_giros')
            ->join('items as mun', 'mun.id', '=', 'sedes_giros.sede_id')
            ->where('sedes_giros.id', 1)->first('mun.nombre as municipio');

        $tipo_minerales = DB::table('categorias')->where('id', 5)
            ->orwhere('id', 6)
            ->get();

        $umedidas = DB::table('sub_categorias')
            ->where("categoria_id", 7)
            ->get(["nombre", "id"]);

        return view(
            'frontend.pems.ingresos.create',
            [
                'tipo_minerales' => $tipo_minerales,
                'sede' => $sede,
                'umedidas' => $umedidas
            ]

        );
    }

    public function store(Request $request)
    {
        /* //dd($request); */
        try {

            DB::beginTransaction();

            $registrar = new Ingreso();

            $registrar->sede_id = 1;
            $registrar->total = $request->get('total');
            $registrar->save();

            $mineral_id = $request->get('mineral_id');
            $unidad_medida_id = $request->get('unidad_medida_id');
            $cantidad = $request->get('cantidad');

            $cont = 0;

            while ($cont < count($mineral_id)) {

                $detalle = new DIngreso();
                $detalle->detalle_sede_id = $registrar->id;
                $detalle->mineral_id = $mineral_id[$cont];
                $detalle->unidad_medida_id = $unidad_medida_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->save();

                $cont = $cont + 1;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return redirect()->route('ingresos.index');
    }


    public function show($id)
    {
        $ingreso = Ingreso::join('sedes_giros as sede', 'sede.id', '=', 'extraccion_minera.sede_id')
            ->join('items as mun', 'mun.id', '=', 'sede.sede_id')
            ->where('extraccion_minera.id', '=', $id)
            ->orderBy('extraccion_minera.id', 'desc')
            ->first(
                [
                    'mun.nombre as municipio',
                    'extraccion_minera.fecha as fecha',
                    'extraccion_minera.total as total'
                ]
            );

        $detalles = DIngreso::join('sub_categorias as mineral', 'mineral.id', '=', 'detalle_extraccion_minera.mineral_id')
            ->join('sub_categorias as medida', 'medida.id', '=', 'detalle_extraccion_minera.unidad_medida_id')
            ->join('categorias as tm', 'tm.id', '=', 'mineral.categoria_id')
            ->where('detalle_extraccion_minera.detalle_sede_id', '=', $id)
            ->orderBy('detalle_extraccion_minera.id', 'desc')->get(
                [
                    'tm.nombre as tmineral',
                    'mineral.nombre as mineral',
                    'medida.nombre as medida',
                    'detalle_extraccion_minera.cantidad as cantidad'
                ]
            );

        return view('frontend.pems.ingresos.show', compact('ingreso', 'detalles'));
    }
}
