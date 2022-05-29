
@extends('frontend.layouts.app')
@section('title', 'Editar categoría')
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
                Editar categoría
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('giros.index') }}">Giros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Giros</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Giros</h4>
                        </div>

                        <form action="{{ route('giros.update', $giro->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="nombre" id="nombre" value="{{ $giro->nombre }}"
                                    class="form-control" placeholder="Nombre" required>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{ route('giros.index') }}" class="btn btn-danger mr-2">
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
