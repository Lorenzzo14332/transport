@extends('frontend.layouts.app')

@section('title', 'Editar Item')
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
                Edición de Items
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{-- {{route('products.index')}} --}}">Items</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edición de Items</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Edición de Items</h4>
                        </div>

                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" value="{{ $item->nombre }}" class="form-control"
                                    aria-describedby="helpId" required>
                            </div>
                            
                            <br>

                            <div class="form-group">
                                <label for="sub_categoria_id">Subcategoría</label>
                                <select class="form-control" name="sub_categoria_id" id="sub_categoria_id">
                                    @foreach ($subcategorias as $subcat)
                                        <option value="{{ $subcat->id }}"
                                            @if ($subcat->id == $item->sub_categoria_id ) selected @endif>{{ $subcat->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary mr-2">Editar</button>
                            <a href="{{ route('items.index') }}" class="btn btn-danger mr-2">
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
<script src="{{ asset('assets/js/dropify.js') }}"></script>
@endsection
