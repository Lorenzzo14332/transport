@extends('frontend.layouts.app')

@section('title','Editar Ubicacion')
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
            Edición de Ubicaciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('pems.index')}}">Ubicaciones</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de Ubicaciones</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de Ubicaciones</h4>
                    </div>

                    <form action="{{ route('pems.update', $ubicacion->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoria_id">Departamento</label>
                                <select class="form-control col-sm-6" name="departamento" id="departamento">
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
                                    @foreach ($municipios as $mun)
                                        <option value="{{ $mun->id }}"
                                            @if ($mun->id == $ubicacion->sede_id) selected @endif>{{ $mun->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="tipo_extaccion_id">Tipo de Extacci&oacute;n</label>
                                <select class="form-control" name="tipo_extaccion_id" id="tipo_extaccion_id">
                                    @foreach ($t_extacciones as $te)
                                        <option value="{{ $te->id }}"
                                            @if ($te->id == $ubicacion->tipo_extaccion_id) selected @endif>{{ $te->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_extaccion_id')
                                    <p class="text-primary bg-red">{{ $message }}</p>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="clas_min_id">Clasificaci&oacute;n</label>
                                <select class="form-control" name="clas_min_id" id="clas_min_id">
                                    @foreach ($clas as $cla)
                                        <option value="{{ $cla->id }}"
                                            @if ($cla->id == $ubicacion->clas_min_id) selected @endif>{{ $cla->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('clas_min_id')
                                    <p class="text-primary bg-red">{{ $message }}</p>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="nombre">Orden</label>
                                <input type="text" class="form-control" name="orden" id="orden" placeholder="Orden"
                                    value="{{ $ubicacion->orden }}">
                                @error('orden')
                                    <p class="text-primary bg-red">{{ $message }}</p>
                                @enderror
                            </div>
                    <br>

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{route('pems.index')}}" class="btn btn-danger mr-2">
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
                    departamento: departamento,
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
