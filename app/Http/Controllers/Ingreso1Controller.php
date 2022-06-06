<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giro;
use App\Models\Item;
use App\Models\Ingreso;
use App\Models\DIngreso;
use App\Models\Categoria;
use App\Models\Subcategoria;

use Illuminate\Support\Facades\DB;

class Ingreso1Controller extends Controller
{
    public function index()
    {
        $primas = Ingreso::where('sede_id', 2)->get();
        return view('frontend.primas.ingreso.index',
            [
                'primas' => $primas
            ]
        );
    }

    public function create()
    {
        $sede = DB::table('sedes_giros')
        ->join('items as mun', 'mun.id', '=', 'sedes_giros.sede_id')
        ->where('sedes_giros.id', 2)->first('mun.nombre as municipio');

        $tipo_materiales = Subcategoria::where('categoria_id', 9)
            ->get();


    return view('frontend.primas.ingreso.create',
        [
            'sede' => $sede,
            'tipo_materiales' => $tipo_materiales
        ]
    );
    }

    public function tipos(Request $request)
    {
        $data['items'] = Item::where("sub_categoria_id", $request->materiales)
            ->get(["nombre", "id"]);

        return response()->json($data);
    }


    public function store(Request $request)
    {
        try {
            //dd($request);
            DB::beginTransaction();

            $registrar = new Ingreso;

            $registrar->sede_id = 2;
            $registrar->total = $request->get('total');
            $registrar->save();

            $tipo_id = $request->get('tipo_id');
            $cantidad = $request->get('cantidad');

            $cont = 0;

            while ($cont < count($tipo_id)) {

                $detalle = new DIngreso;
                $detalle->detalle_sede_id = $registrar->id;
                $detalle->tipo_id = $tipo_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->save();

                $cont = $cont + 1;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return redirect()->route('primas_ingresos.index');
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

        $detalles = DIngreso::join('items as tipo', 'tipo.id', '=', 'detalle_extraccion_minera.tipo_id')
            ->join('sub_categorias as material', 'material.id', '=', 'tipo.sub_categoria_id')
            ->where('detalle_extraccion_minera.detalle_sede_id', '=', $id)
            ->orderBy('detalle_extraccion_minera.id', 'desc')->get(
                [
                    'tipo.nombre as tipo',
                    'material.nombre as material',
                    'detalle_extraccion_minera.cantidad as cantidad'
                ]
            );

        return view('frontend.primas.ingreso.show', compact('ingreso', 'detalles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
