@extends('frontend.layouts.app')

@section('title', 'Registro de Mineria')

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
                Registro de Ingresos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('primas_ingresos.index') }}">Ingresos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Ingresos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <form action="{{ route('primas_ingresos.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            @include('frontend.primas.ingreso._form')

                            <div class="" id="guardar">
                                <div class="row">
                                    <div style="margin:4px">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                    <div class="" style="margin:4px">
                                        <a href="{{ route('primas_ingresos.index') }}" id="cancel" name="cancel"
                                            class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#t_material').on('change', function() {
            var materiales = this.value;
            $("#tipo_id").html('');
            $.ajax({
                url: "{{ route('tipos') }}",
                type: "POST",
                data: {
                    materiales: materiales,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#tipo_id").append('<option value=0 selected>Seleccione</option>');
                    $.each(result.items, function(key, value) {
                        $("#tipo_id").append('<option value="' + value.id +
                            '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#agregar').click(function() {
                agregar();
            });
        });

        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();


        function agregar() {
            t_material  = $("#t_material ").val();
            tmaterial  = $("#t_material  option:selected").text();
            tipo_id  = $("#tipo_id ").val();
            tipoid  = $("#tipo_id  option:selected").text();
            cantidad = $("#cantidad").val();

            if (tipo_id != "" && cantidad > 0) {

                subtotal[cont] = cantidad * 1;
                total = total + subtotal[cont];

                var fila = '<tr class = "selected" id = "fila' + cont + '" >' +
                    '<td><button type="button" class = "btn btn-danger btn-sm" onclick="eliminar(' + cont +
                    ');"><i class="fa fa-times fa-2x"></i></button></dt>'+
                    '<td><input type="hidden" name = "t_material[]" value = "' + t_material + '">' + tmaterial + '</td>' +
                    '<td><input type="hidden" name = "tipo_id[]" value = "' + tipo_id + '">' + tipoid + '</td>' +
                    '<td><input type="hidden" name = "cantidad[]" value = "' + cantidad + '">' + cantidad + '</td>' +
                    '<td>' + subtotal[cont] + '</td>' +
                    '</tr>';

                cont++;

                limpiar();

                $("#total_").html(total);
                $("#total").val(total);

                evaluar();

                $("#detalles").append(fila);
            } else {
                alert("Error al ingresar, revise los datos");
            }
        }

        function limpiar() {
            $("#tipo_id").val("");
            $("#cantidad").val("");
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("S/. " + total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endpush
