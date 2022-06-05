<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\DIngreso;

class GraficosController extends Controller
{
    public function index()
    {
        $fechas = Ingreso::where('extraccion_minera.sede_id', 1)
        ->get();
        
        $puntos = [];
        
        foreach ($fechas as $fecha) {
            $puntos[] = [
                'name' => $fecha['fecha'],
                'y' => floatval($fecha['total']),
            ];
        }

        return view(
            'frontend.pems.ingresos.graficos',
            [
                "data" => json_encode($puntos),
            ]
        );
    }
}
