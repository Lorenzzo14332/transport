<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\DIngreso;

class GraficosController extends Controller
{
    public function index()
    {
        return view('frontend.pems.ingresos.graficos');
}}
