@extends('admin.layouts.app')

@section('content')
    <section class="content">


        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Todos los Cargos</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>

                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('cargos.index') }}" onClick="return false;">Cargos</a>
                        </li>
                        <li class="breadcrumb-item active">Detalles de Cargo</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Detalles</strong> del Cargo
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu float-end">
                                    <li>
                                        <a href="javascript:void(0);">Action</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Another action</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="container">


                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $cargo->nombre_cgo }}</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Area:</strong> {{ $cargo->area->nombre_are }}</p>
                                <p><strong>Abreviatura:</strong> {{ $cargo->abreviatura_cgo }}</p>
                                <p><strong>Estado:</strong> {{ $cargo->estado_cgo ? 'Activo' : 'Inactivo' }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('cargos.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
