<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="codigo_col">Colaborador</label>
                        <select id="codigo_col" class="form-control @error('codigo_col') is-invalid @enderror" wire:model="codigo_col" required>
                            <option value="">Selecciona colaborador</option>
                            @foreach($colaboradores as $colaborador)
                                <option value="{{ $colaborador->codigo_col }}">
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
                                <option value="{{ $horario->codigo_hor }}">
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
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="estado_cto">Estado</label>
                        <select id="estado_cto" class="form-control @error('estado_cto') is-invalid @enderror" wire:model="estado_cto">
                            <option value="">Selecciona estado</option>
                            <option value="1" {{ $estado_cto == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $estado_cto == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado_cto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-12 p-t-20 text-center">
                <button type="submit" class="btn btn-primary waves-effect m-r-15">Actualizar</button>
                <a href="{{ route('contratos.index') }}" class="btn btn-danger waves-effect">Cancelar</a>
            </div>
        </div>
    </form>
</div>