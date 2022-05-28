@extends('frontend.layouts.app')

@section('title','Registrar Subcategorias')
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
            Registro de Subcategorias
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('subcategorias.index')}}">Subcategorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Subcategorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Subcategorias</h4>
                    </div>
        
                    <form action="{{ route('subcategorias.store') }}" method="POST">
                        @csrf

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" aria-describedby="helpId" required>
                    </div>
                    
                    <br>

                    <div class="form-group">
                      <label for="category_id">Categoría</label>
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        <option selected>Seleccione Categoría</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <br>

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
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
<script src="{{ asset('assets/js/dropify.js') }}"></script>
@endsection