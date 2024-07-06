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
                <!-- Nombres -->
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre_are">Nombre</label>
                            <input id="nombre_are" type="text"
                                class="form-control @error('nombre_are') is-invalid @enderror" wire:model="nombre_are">
                            @error('nombre_are')
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
                            <label for="nombres_col">Abreviatura</label>
                            <input id="nombres_col" type="text"
                                class="form-control @error('abreviatura_are') is-invalid @enderror"
                                wire:model="abreviatura_are">
                            @error('abreviatura_are')
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
                            <select id="estado_col" class="form-control @error('estado_are') is-invalid @enderror"
                                wire:model="estado_are">
                                <option value="">Selecciona estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado_are')
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
                    <a href="{{ route('areas.index') }}" class="btn btn-danger waves-effect">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
