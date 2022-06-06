@extends('frontend.layouts.app')

@section('title', 'Detalles de Ingresos')

@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Detalles de ingreso
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="#">Ingresos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de ingreso</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="form-group row">
                                <div class="col-md-4 text-center">
                                    <label class="form-control-label" for="nombre"><strong>Sede</strong></label>
                                    <p><mark class="alert-success">{{$ingreso->municipio}}</mark></p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <label class="form-control-label" for="num_compra"><strong>Fecha</strong></label>
                                    <p>{{$ingreso->fecha}}</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <label class="form-control-label" for="num_compra"><strong>Total</strong></label>
                                    <p>{{$ingreso->total}}</p>
                                </div>
                            </div>
    
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Detalles de Ingreso</h3>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="table-responsive col-md-12">
                                    <table id="detalles" class="table">
                                        <thead>
                                            <tr>
                                                <th>Material</th>
                                                <th>Tipo</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3">
                                                    <p align="right">TOTAL:</p>
                                                </th>
                                                <th>
                                                    <p align="right">{{number_format($ingreso->total,2)}}</p>
                                                </th>
                                            </tr>
    
                                        </tfoot>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                            <tr>
                                                <td>{{$detalle->material }}</td>
                                                <td>{{$detalle->tipo }}</td>
                                                <td>{{number_format($detalle->cantidad,2)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('primas_ingresos.index') }}" class="btn btn-primary float-right">Regresar</a>
                </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('primas_ingresos.index') }}" class="btn btn-primary float-right">Regresar</a>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/profile-demo.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endsection
