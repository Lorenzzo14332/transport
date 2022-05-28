@extends('frontend.layouts.app')

@section('title','Editar Subcategoria')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de Subcategorias
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('subcategorias.index')}}">Subcategorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de Subcategorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de Subcategorias</h4>
                    </div>

                    <form action="{{ route('subcategorias.update', $subcategoria->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="nombre" id="nombre" value="{{$subcategoria->nombre}}" class="form-control" aria-describedby="helpId" required>
                    </div>
                    
                    <br>

                    <div class="form-group">
                      <label for="categoria_id">Categoría</label>
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" 
                            @if ($categoria->id == $subcategoria->categoria_id)
                            selected
                            @endif
                            >{{$categoria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>

                    <br>

                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('subcategorias.index')}}" class="btn btn-danger mr-2">
                        Cancelar
                     </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endsection