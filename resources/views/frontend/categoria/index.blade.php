@extends('frontend.layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <p>Add lightweight datatables to your project with using the <a
                            href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a>
                        library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable
                    </p>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Orden</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php   
                                $i = 1;
                            @endphp

                            @foreach ($categorias as $cat)
                                <tr>
                                    <th class="text-center" scope="row">

                                        @php
                                            
                                            echo $i++;
                                            
                                        @endphp

                                    <td>{{ $cat->nombre }}</td>
                                    <td>{{ $cat->descripcion }}</td>
                                    <td>{{ $cat->orden }}</td>
                                    <td>2016-05-25</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection