<div>
    <div class="container-fluid">
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
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <!-- Tipo de Documento -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_col">Colaborador</label>
                        <select id="codigo_col" class="form-control @error('codigo_col') is-invalid @enderror" wire:model="codigo_col" required>
                            <option value="">Selecciona colaborador</option>
                            @foreach($colaboradores as $colaborador)
                                <option value="{{ $tipoDocumento->codigo_col }}">
                                    {{ $colaborador->nombres_col }} 
                                    {{ $colaborador->apellidopaterno_col }} 
                                    {{ $colaborador->apellidomaterno_col }}
                                </option>
                            @endforeach
                        </select>
                        @error('codigo_col')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_hor">Horario</label>
                        <select id="codigo_hor" class="form-control @error('codigo_hor') is-invalid @enderror" wire:model="codigo_hor" required>
                            <option value="">Selecciona horario</option>
                            @foreach($horarios as $horario)
                                <option value="{{ $tipoDocumento->codigo_hor }}">
                                    {{ $horario->horainicio_hor }} - 
                                    {{ $horario->horafin_hor }}
                                </option>
                            @endforeach
                        </select>
                        @error('codigo_hor')
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
                        <label for="fechainicio_cco">Fecha de Inicio</label>
                        <input id="fechainicio_cco" type="date" class="form-control @error('fechainicio_cco') is-invalid @enderror" wire:model="fechainicio_cco">
                        @error('fechainicio_cco')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fechafin_cco">Fecha Final</label>
                        <input id="fechafin_cco" type="date" class="form-control @error('fechafin_cco') is-invalid @enderror" wire:model="fechafin_cco">
                        @error('fechafin_cco')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row clearfix">
    
                <!-- Remuneración -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="remuneracion_cco">Remuneración</label>
                        <input id="remuneracion_cco" type="number" step="0.01" class="form-control @error('remuneracion_cco') is-invalid @enderror" wire:model="remuneracion_cco">
                        @error('remuneracion_cco')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Estado -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="estado_cco">Estado</label>
                        <select id="estado_cco" class="form-control @error('estado_cco') is-invalid @enderror" wire:model="estado_cco">
                            <option value="">Selecciona estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        @error('estado_cco')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
