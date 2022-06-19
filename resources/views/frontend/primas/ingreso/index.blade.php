@extends('frontend.layouts.app')

@section('title', 'Gestión de Ingresos')

@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }

    </style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Ingresos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ingresos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Ingresos</h4>
                            <div class="card-header">
                                <li class="nav-item d-none d-lg-flex">
                                    <a class="nav-link" href="{{ route('primas_ingresos.create') }}">
                                        <span class="btn btn-info">Nueva</span>
                                    </a>
                                </li>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th style="width:50px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($primas as $prima)
                                        <tr>
                                            <th scope="row">
                                                {{ $prima->id }}</a>
                                            </th>
                                            <td>
                                                {{ $prima->fecha }}
                                            </td>
                                            <td>{{ $prima->total }}</td>
                                            <td style="width: 50px;">
                                                
                                                <a class="jsgrid-button jsgrid-edit-button"
                                                    href="{{ route('primas_ingresos.show', $prima->id) }}" title="Editar">
                                                    <i class="fas fa-glasses"></i>
                                                </a>
                                                
                                                <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                    type="submit" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endsection
