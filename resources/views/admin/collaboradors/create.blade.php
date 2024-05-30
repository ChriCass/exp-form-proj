@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Employees</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="../../index.html">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Employees</a>
                        </li>
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Add</strong> Employee</h2>
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
                    <form method="POST" action="{{ route('colaboradors.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="body">
                            <!-- Tipo de Documento -->
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="codigo_tdoc">Tipo de Documento</label>
                                            <select id="codigo_tdoc" class="form-control @error('codigo_tdoc') is-invalid @enderror" name="codigo_tdoc" required>
                                                <!-- Suponiendo que tienes una colección de tipos de documentos en tu controlador -->
                                                @foreach($tipoDocumentos as $tipoDocumento)
                                                    <option value="{{ $tipoDocumento->codigo_tdoc }}" {{ old('codigo_tdoc') == $tipoDocumento->codigo_tdoc ? 'selected' : '' }}>
                                                        {{ $tipoDocumento->nombre_tdoc }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('codigo_tdoc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="numerodoc_col">Número de Documento</label>
                                            <input id="numerodoc_col" type="text" class="form-control @error('numerodoc_col') is-invalid @enderror" name="numerodoc_col" value="{{ old('numerodoc_col') }}" required>
                                            @error('numerodoc_col')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Apellidos y Nombres -->
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="apellidopaterno_col">Apellido Paterno</label>
                                            <input id="apellidopaterno_col" type="text" class="form-control @error('apellidopaterno_col') is-invalid @enderror" name="apellidopaterno_col" value="{{ old('apellidopaterno_col') }}" required>
                                            @error('apellidopaterno_col')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="apellidomaterno_col">Apellido Materno</label>
                                            <input id="apellidomaterno_col" type="text" class="form-control @error('apellidomaterno_col') is-invalid @enderror" name="apellidomaterno_col" value="{{ old('apellidomaterno_col') }}" required>
                                            @error('apellidomaterno_col')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="nombres_col">Nombres</label>
                                            <input id="nombres_col" type="text" class="form-control @error('nombres_col') is-invalid @enderror" name="nombres_col" value="{{ old('nombres_col') }}" required>
                                            @error('nombres_col')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Sexo -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="codigo_sex">Sexo</label>
                                            <select id="codigo_sex" class="form-control @error('codigo_sex') is-invalid @enderror" name="codigo_sex">
                                                <!-- Suponiendo que tienes una colección de sexos en tu controlador -->
                                                @foreach($sexos as $sexo)
                                                    <option value="{{ $sexo->codigo_sex }}" {{ old('codigo_sex') == $sexo->codigo_sex ? 'selected' : '' }}>
                                                        {{ $sexo->nombre_sex }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('codigo_sex')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Cargo -->
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="codigo_cgo">Cargo</label>
                                            <select id="codigo_cgo" class="form-control @error('codigo_cgo') is-invalid @enderror" name="codigo_cgo">
                                                <!-- Suponiendo que tienes una colección de cargos en tu controlador -->
                                                @foreach($cargos as $cargo)
                                                    <option value="{{ $cargo->codigo_cgo }}" {{ old('codigo_cgo') == $cargo->codigo_cgo ? 'selected' : '' }}>
                                                        {{ $cargo->nombre_cgo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('codigo_cgo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Régimen Pensionario -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="codigo_rp">Régimen Pensionario</label>
                                            <select id="codigo_rp" class="form-control @error('codigo_rp') is-invalid @enderror" name="codigo_rp">
                                                <!-- Suponiendo que tienes una colección de regímenes pensionarios en tu controlador -->
                                                @foreach($regimenesPensionarios as $regimenPensionario)
                                                    <option value="{{ $regimenPensionario->codigo_rp }}" {{ old('codigo_rp') == $regimenPensionario->codigo_rp ? 'selected' : '' }}>
                                                        {{ $regimenPensionario->nombre_rp }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('codigo_rp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- EPS -->
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="codigo_eps">EPS</label>
                                            <select id="codigo_eps" class="form-control @error('codigo_eps') is-invalid @enderror" name="codigo_eps">
                                                <!-- Suponiendo que tienes una colección de EPS en tu controlador -->
                                                @foreach($epss as $eps)
                                                    <option value="{{ $eps->codigo_eps }}" {{ old('codigo_eps') == $eps->codigo_eps ? 'selected' : '' }}>
                                                        {{ $eps->nombre_eps }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('codigo_eps')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Remuneración -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="remuneracion_col">Remuneración</label>
                                            <input id="remuneracion_col" type="number" step="0.01" class="form-control @error('remuneracion_col') is-invalid @enderror" name="remuneracion_col" value="{{ old('remuneracion_col') }}">
                                            @error('remuneracion_col')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Fechas de Ingreso y Cese -->
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="fechaingreso_col">Fecha de Ingreso</label>
                                            <input id="fechaingreso_col" type="date" class="form-control @error('fechaingreso_col') is-invalid @enderror" name="fechaingreso_col" value="{{ old('fechaingreso_col') }}">
                                            @error('fechaingreso_col')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="fechacese_per">Fecha de Cese</label>
                                            <input id="fechacese_per" type="date" class="form-control @error('fechacese_per') is-invalid @enderror" name="fechacese_per" value="{{ old('fechacese_per') }}">
                                            @error('fechacese_per')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Estado -->
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="estado_col">Estado</label>
                                            <select id="estado_col" class="form-control @error('estado_col') is-invalid @enderror" name="estado_col">
                                                <option value="1" {{ old('estado_col') == 1 ? 'selected' : '' }}>Activo</option>
                                                <option value="0" {{ old('estado_col') == 0 ? 'selected' : '' }}>Inactivo</option>
                                            </select>
                                            @error('estado_col')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Submit Button -->
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                <button type="reset" class="btn btn-danger waves-effect">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
