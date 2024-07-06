
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
                        <label for="nombres_col">Nombre</label>
                        <input id="nombres_col" type="text" class="form-control @error('nombre_are') is-invalid @enderror" wire:model="nombre_are" required>
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
                        <label for="abreviatura_col">Abreviatura</label>
                        <input id="abreviatura_col" type="text" class="form-control @error('abreviatura_are') is-invalid @enderror" wire:model="abreviatura_are" required>
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
                        <select id="estado_col" class="form-control @error('estado_are') is-invalid @enderror" wire:model="estado_are">
                            <option value="">Selecciona estado</option>
                            <option value="1" {{ $estado_are == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $estado_are == 0 ? 'selected' : '' }}>Inactivo</option>
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
                <a href="{{ route('areas.index') }}" class="btn btn-danger waves-effect">Cancelar</a>
            </div>
        </div>
    </form>
</div>
