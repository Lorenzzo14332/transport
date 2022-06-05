@extends('frontend.layouts.app')

@section('title', 'Registrar Ubicaciones')
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
                Registro de Ubicaciones
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('primas.index') }}">Ubicaciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Ubicaciones</li>
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

                        <form action="{{ route('primas.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="departamento">Departamento</label>
                                <select class="form-control" name="departamento" id="departamento">
                                    <option selected>Seleccione Departamento</option>
                                    @foreach ($deps as $dep)
                                        <option value="{{ $dep->id }}">{{ $dep->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="subcategoria_id">Municipio</label>
                                <select class="form-control col-sm-6" name="sede_id" id="sede_id">
                                    <option selected>Seleccione Municipio</option>
                                </select>
                            </div>


                            <br>

                            <div class="form-group">
                                <label for="nombre">Orden</label>
                                <input type="text" class="form-control" name="orden" id="orden" placeholder="Orden">
                                @error('orden')
                                    <p class="text-primary bg-red">{{ $message }}</p>
                                @enderror
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a href="{{ route('primas.index') }}" class="btn btn-danger mr-2">
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

@push('scripts')

<script>
    $('#departamento').on('change', function() {
            var departamento = this.value;
            $("#sede_id").html('');
            $.ajax({
                url: "{{ route('municipios') }}",
                type: "POST",
                data: {
                    departamento : departamento,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#sede_id").append('<option value=0 selected>Seleccione Municipio</option>');
                    $.each(result.items, function(key, value) {
                        $("#sede_id").append('<option value="' + value.id +
                            '">' + value.nombre + '</option>');
                    });
                }
            });
        });

</script>
@endpush

