@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Detalles del Horario</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('horarios.index') }}" onClick="return false;">Horarios</a>
                        </li>
                        <li class="breadcrumb-item active">Detalles</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Datos</strong> del Horario</h2>
                    </div>
                    <div class="body">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h3>Horario</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Hora de Inicio:</strong> {{ $horario->horainicio_hor }}</p>
                                <p><strong>Hora Final:</strong> {{ $horario->horafin_hor }}</p>
                                <p><strong>Estado:</strong> {{ $horario->estado_hor ? 'Activo' : 'Inactivo' }}</p>
                            </div>
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white">
                                <h3>Detalle del Horario</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Hora de Inicio:</strong> {{ $horario->detalle->horainicio_dho }}</p>
                                <p><strong>Hora Final:</strong> {{ $horario->detalle->horafin_dho }}</p>
                                <p><strong>Día:</strong> {{ $horario->detalle->dia_dho }}</p>
                                <p><strong>Tipo:</strong> {{ $horario->detalle->tipo_dho }}</p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
