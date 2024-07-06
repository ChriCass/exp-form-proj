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
                            <label for="codigo_col">Colaborador</label>
                            <select id="codigo_col" class="form-control @error('codigo_col') is-invalid @enderror"
                                wire:model="codigo_col">
                                <option value="">Selecciona colaborador</option>
                                @foreach ($colaboradores as $colaborador)
                                    <option value="{{ $colaborador->codigo_col }}">
                                        {{ $colaborador->apellidopaterno_col }}
                                        {{ $colaborador->apellidomaterno_col }}
                                        {{ $colaborador->nombres_col }}
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
                            <label for="nombre_are">Nombre</label>
                            <input id="nombre_are" type="text"
                                class="form-control @error('nombre_usuario') is-invalid @enderror"
                                wire:model="nombre_usuario">
                            @error('nombre_usuario')
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
                            <label for="nombres_col">Correo</label>
                            <input id="nombres_col" type="email"
                                class="form-control @error('email') is-invalid @enderror" wire:model="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" wire:model="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Rol y Estado -->
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="codigo_rol">Rol</label>
                            <select id="codigo_rol" class="form-control @error('codigo_rol') is-invalid @enderror"
                                wire:model="codigo_rol">
                                <option value="">Selecciona rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->codigo_rol }}">
                                        {{ $rol->nombre_rol }}
                                    </option>
                                @endforeach
                            </select>
                            @error('codigo_rol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="estado_col">Estado</label>
                            <select id="estado_col" class="form-control @error('estado_usu') is-invalid @enderror"
                                wire:model="estado_usu">
                                <option value="">Selecciona estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado_usu')
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
                    <a href="{{ route('users.index') }}" class="btn btn-danger waves-effect">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
