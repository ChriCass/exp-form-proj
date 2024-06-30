@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Editar Detalle del Horario</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('horarios.index') }}" onClick="return false;">Horarios</a>
                        </li>
                        <li class="breadcrumb-item active">Editar Detalle</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Editar</strong> Detalle</h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('horarios.updateDetalle', $detalle->codigo_dho) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="horainicio_dho">Hora de Inicio</label>
                                <input type="time" class="form-control" id="horainicio_dho" name="horainicio_dho" value="{{ $detalle->horainicio_dho }}" required>
                            </div>
                            <div class="form-group">
                                <label for="horafin_dho">Hora de Fin</label>
                                <input type="time" class="form-control" id="horafin_dho" name="horafin_dho" value="{{ $detalle->horafin_dho }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo_dho">Tipo</label>
                                <input type="text" class="form-control" id="tipo_dho" name="tipo_dho" value="{{ $detalle->tipo_dho }}" required>
                            </div>
                            <div class="form-group">
                                <label for="dia_dho">Día</label>
                                <input type="text" class="form-control" id="dia_dho" name="dia_dho" value="{{ $detalle->dia_dho }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Detalle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
