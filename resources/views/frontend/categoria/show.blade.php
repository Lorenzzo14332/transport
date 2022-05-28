@extends('frontend.layouts.app')

@section('title','Subcategoria de categoría')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>
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
            Subcategorias que pertenecen a {{$categoria->nombre}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{-- {{route('home')}} --}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$categoria->nombre}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Subcategoria de la categoría {{$categoria->nombre}}</h4>
                        <div class="card-header">
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" href="{{ route('subcategorias.create') }}">
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
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria->sub_categorias as $subcat)
                                <tr>
                                    <th scope="row">{{$subcat->id}}</th>
                                    <td>
                                        <a href="{{ route('subcategorias.show', $subcat) }}"> {{ $subcat->nombre }} </a>
                                    </td>
                                    <td>{{$subcat->categoria->nombre}}</td>
                                    <td style="width: 50px;">

                                        <form action="{{ route('subcategorias.destroy', $subcat->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                    
                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('subcategorias.edit', $subcat)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
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
                <div class="card-footer text-muted">
                    <a href="{{-- {{route('categories.index')}} --}}" class="btn btn-primary float-right">Regresar</a>
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