<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form  wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <!-- Tipo de Documento -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_tdoc">Tipo de Documento</label>
                        <select id="codigo_tdoc" class="form-control @error('codigo_tdoc') is-invalid @enderror" wire:model="codigo_tdoc" required>
                            <option value="">Selecciona tipo de documento</option>
                            @foreach($tipoDocumentos as $tipoDocumento)
                                <option value="{{ $tipoDocumento->codigo_tdoc }}">
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
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="numerodoc_col">Número de Documento</label>
                        <input id="numerodoc_col" type="text" class="form-control @error('numerodoc_col') is-invalid @enderror" wire:model="numerodoc_col" required>
                        @error('numerodoc_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Apellidos y Nombres -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="apellidopaterno_col">Apellido Paterno</label>
                        <input id="apellidopaterno_col" type="text" class="form-control @error('apellidopaterno_col') is-invalid @enderror" wire:model="apellidopaterno_col" required>
                        @error('apellidopaterno_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="apellidomaterno_col">Apellido Materno</label>
                        <input id="apellidomaterno_col" type="text" class="form-control @error('apellidomaterno_col') is-invalid @enderror" wire:model="apellidomaterno_col" required>
                        @error('apellidomaterno_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nombres_col">Nombres</label>
                        <input id="nombres_col" type="text" class="form-control @error('nombres_col') is-invalid @enderror" wire:model="nombres_col" required>
                        @error('nombres_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <!-- Sexo -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_sex">Sexo</label>
                        <select id="codigo_sex" class="form-control @error('codigo_sex') is-invalid @enderror" wire:model="codigo_sex">
                            <option value="">Selecciona sexo</option>
                            @foreach($sexos as $sexo)
                                <option value="{{ $sexo->codigo_sex }}">
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
    
            <!-- Cargo -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_cgo">Cargo</label>
                        <select id="codigo_cgo" class="form-control @error('codigo_cgo') is-invalid @enderror" wire:model="codigo_cgo">
                            <option value="">Selecciona cargo</option>
                            @foreach($cargos as $cargo)
                                <option value="{{ $cargo->codigo_cgo }}">
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
    
                <!-- Régimen Pensionario -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_rp">Régimen Pensionario</label>
                        <select id="codigo_rp" class="form-control @error('codigo_rp') is-invalid @enderror" wire:model="codigo_rp">
                            <option value="">Selecciona régimen pensionario</option>
                            @foreach($regimenesPensionarios as $regimenPensionario)
                                <option value="{{ $regimenPensionario->codigo_rp }}">
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
    
            <!-- EPS -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_eps">EPS</label>
                        <select id="codigo_eps" class="form-control @error('codigo_eps') is-invalid @enderror" wire:model="codigo_eps">
                            <option value="">Selecciona EPS</option>
                            @foreach($epss as $eps)
                                <option value="{{ $eps->codigo_eps }}">
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
    
                <!-- Remuneración -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="remuneracion_col">Remuneración</label>
                        <input id="remuneracion_col" type="number" step="0.01" class="form-control @error('remuneracion_col') is-invalid @enderror" wire:model="remuneracion_col">
                        @error('remuneracion_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
    
            <!-- Fechas de Ingreso y Cese -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fechaingreso_col">Fecha de Ingreso</label>
                        <input id="fechaingreso_col" type="date" class="form-control @error('fechaingreso_col') is-invalid @enderror" wire:model="fechaingreso_col">
                        @error('fechaingreso_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fechacese_per">Fecha de Cese</label>
                        <input id="fechacese_per" type="date" class="form-control @error('fechacese_per') is-invalid @enderror" wire:model="fechacese_per">
                        @error('fechacese_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
    
            <!-- Estado -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="estado_col">Estado</label>
                        <select id="estado_col" class="form-control @error('estado_col') is-invalid @enderror" wire:model="estado_col">
                            <option value="">Selecciona estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        @error('estado_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="col-lg-12 p-t-20 text-center">
                <button type="submit" class="btn btn-primary waves-effect m-r-15">Actualizar</button>
                <a href="{{ route('colaboradors.index') }}" class="btn btn-danger waves-effect">Cancelar</a>
            </div>
        </div>
    </form>
</div>
