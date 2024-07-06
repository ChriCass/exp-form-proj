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
                            <label for="codigo_tdoc">Area</label>
                            <select id="codigo_tdoc" class="form-control @error('codigo_are') is-invalid @enderror" wire:model="codigo_are">
                                <option value="">Selecciona un area</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->codigo_are }}">
                                        {{ $area->nombre_are }}
                                    </option>
                                @endforeach
                            </select>
                            @error('codigo_are')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="numerodoc_col">Nombre</label>
                            <input id="numerodoc_col" type="text" class="form-control @error('nombre_cgo') is-invalid @enderror" wire:model="nombre_cgo">
                            @error('nombre_cgo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Abreviatura y Estado -->
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="apellidopaterno_col">Abreviatura</label>
                            <input id="apellidopaterno_col" type="text" class="form-control @error('abreviatura_cgo') is-invalid @enderror" wire:model="abreviatura_cgo">
                            @error('abreviatura_cgo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="estado_col">Estado</label>
                            <select id="estado_col" class="form-control @error('estado_cgo') is-invalid @enderror" wire:model="estado_cgo">
                                <option value="">Selecciona estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado_cgo')
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
                    <a href="{{ route('cargos.index') }}" class="btn btn-danger waves-effect">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
