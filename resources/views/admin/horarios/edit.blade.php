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
                            <h4 class="page-title">Editar Horario</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('horarios.index') }}" onClick="return false;">Horarios</a>
                        </li>
                        <li class="breadcrumb-item active">Editar Horario</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Editar</strong> Horario</h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('horarios.update', $horario->codigo_hor) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="horainicio_hor">Hora de Inicio del Horario</label>
                                <input type="time" class="form-control" id="horainicio_hor" name="horainicio_hor" value="{{ $horario->horainicio_hor }}" required>
                            </div>
                            <div class="form-group">
                                <label for="horafin_hor">Hora de Fin del Horario</label>
                                <input type="time" class="form-control" id="horafin_hor" name="horafin_hor" value="{{ $horario->horafin_hor }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Horario</button>
                        </form>
                        <hr>
                        <h3>Editar Detalle del Horario</h3>
                        <form method="POST" action="{{ route('detalles.update', $detalle->codigo_dho) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="horainicio_dho">Hora de Inicio del Detalle</label>
                                <input type="time" class="form-control @error('horainicio_dho') is-invalid @enderror" id="horainicio_dho" name="horainicio_dho" value="{{ old('horainicio_dho', $detalle->horainicio_dho) }}" required>
                                @error('horainicio_dho')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="horafin_dho">Hora de Fin del Detalle</label>
                                <input type="time" class="form-control @error('horafin_dho') is-invalid @enderror" id="horafin_dho" name="horafin_dho" value="{{ old('horafin_dho', $detalle->horafin_dho) }}" required>
                                @error('horafin_dho')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipo_dho">Tipo</label>
                                <input type="text" class="form-control @error('tipo_dho') is-invalid @enderror" id="tipo_dho" name="tipo_dho" value="{{ old('tipo_dho', $detalle->tipo_dho) }}" required>
                                @error('tipo_dho')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dia_dho">Día</label>
                                <input type="text" class="form-control @error('dia_dho') is-invalid @enderror" id="dia_dho" name="dia_dho" value="{{ old('dia_dho', $detalle->dia_dho) }}" required>
                                @error('dia_dho')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
