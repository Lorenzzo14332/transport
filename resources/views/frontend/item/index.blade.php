@extends('frontend.layouts.app')

@section('title', 'Gestión de Items')
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
                Items
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Items</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Itmes</h4>
                            <div class="card-header">
                                <li class="nav-item d-none d-lg-flex">
                                    <a class="nav-link" href="{{ route('items.create') }}">
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
                                        <th>Subcategoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>
                                                <a href="{{ route('items.show', $item) }}">{{ $item->nombre }}</a>
                                            </td>
                                            <td>{{ $item->sub_categorias->nombre }}</td>
                                            <td style="width: 50px;">
                                                <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <a class="jsgrid-button jsgrid-edit-button"
                                                        href="{{ route('items.edit', $item) }}" title="Editar">
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
