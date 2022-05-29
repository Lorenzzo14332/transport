@extends('frontend.layouts.app')

@section('title', 'Gestión de Giros')
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
                Giros
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giros</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">{{ $categoria->nombre }}</h4>
                            <div class="card-header">
                                <li class="nav-item d-none d-lg-flex">
                                    <a class="nav-link" href="{{ route('giros.create') }}">
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
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($giros as $giro)
                                        <tr>
                                            <th scope="row">{{ $giro->id }}</th>
                                            <td>
                                                <a
                                                    href="{{ route('giros.show', $giro) }}">{{ $giro->nombre }}</a>
                                            </td>
                                            <td>{{ $giro->description }}</td>
                                            <td>
                                                <form action="{{ route('giros.destroy', $giro->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <a class="jsgrid-button jsgrid-edit-button"
                                                        href="{{ route('giros.edit', $giro->id) }}" title="Editar">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                        type="submit" title="Eliminar">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
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