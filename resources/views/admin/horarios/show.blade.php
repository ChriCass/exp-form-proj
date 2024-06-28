@extends('admin.layouts.app')

@section('content')
    <section class="content">


        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Todos los Horarios</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('horarios.index') }}" onClick="return false;">Horario</a>
                        </li>
                        <li class="breadcrumb-item active">Detalles de Horario</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Datos</strong> del Horario   
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
                            <div class="card-body">
                                <p><strong>Hora de Inicio:</strong> {{ $horario->horainicio_hor }}</p>
                                <p><strong>Hora Final:</strong> {{ $horario->horafin_hor }}</p>
                                <p><strong>Estado:</strong> {{ $horario->estado_hor ? 'Activo' : 'Inactivo' }}</p>
                            </div>
                            @foreach($horario->detalles as $detalle)
                            <div class="card-body">
                                <p><strong>Detalle de horario</strong></p>
                                <p>&nbsp;&nbsp;<strong>Hora de Inicio:</strong> {{ $detalle->horainicio_dho }}</p>
                                <p>&nbsp;&nbsp;<strong>Hora Final:</strong> {{ $detalle->horafin_dho }}</p>
                                <p>&nbsp;&nbsp;<strong>Día:</strong> {{ $detalle->dia_dho }}</p>
                                <p>&nbsp;&nbsp;<strong>Tipo:</strong> {{ $detalle->tipo_dho }}</p>
                            </div>
                            @endforeach
                            <div class="card-footer">
                                <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
