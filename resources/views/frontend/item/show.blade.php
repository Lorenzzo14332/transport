@extends('frontend.layouts.app')

@section('title','información del Item')
@section('styles')

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
            {{ $item->nombre }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{-- {{route('home')}} --}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('items.index')}}">Items</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$item->nombre}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">

                                <h3>{{ $item->nombre }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Subcategoría
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="">
                                            {{ $item->sub_categorias->nombre}}
                                        </a>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del Item</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Descripcion</strong>
                                        <p class="text-muted">
                                            {{$item->descripcion}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Orden</strong>
                                        <p class="text-muted">
                                            {{$item->orden}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('items.index')}}" class="btn btn-primary float-right">Regresar</a>
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