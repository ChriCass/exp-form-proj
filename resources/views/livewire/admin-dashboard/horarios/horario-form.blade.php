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
            <!-- Fechas de Ingreso y Cese -->
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="horainicio_hor">Hora de Inicio</label>
                        <input id="horainicio_hor" type="time" class="form-control @error('horainicio_hor') is-invalid @enderror" wire:model="horainicio_hor">
                        @error('horainicio_hor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="horafin_hor">Hora Final</label>
                        <input id="horafin_hor" type="time" class="form-control @error('horafin_hor') is-invalid @enderror" wire:model="horafin_hor">
                        @error('horafin_hor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div id="detalles"></div>

            <!-- Submit Button -->
            <div class="col-lg-12 p-t-20 text-center">
                <button type="button" class="btn btn-primary waves-effect m-r-15" id="add">Añadir Detalle</button>
                <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                <button type="reset" class="btn btn-danger waves-effect">Cancel</button>
            </div>
            <script type="text/javascript">
                var detalles = document.getElementById('detalles');
                var i = 1;
                document.getElementById('add').onclick = function() {
                    str = `
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="horainicio_dho_${i}">Hora de Inicio</label>
                                    <input id="horainicio_dho_${i}" type="time" class="form-control @error('horainicio_dho_${i}') is-invalid @enderror" wire:model="horainicio_dho_${i}">
                                    @error('horainicio_dho_${i}')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="horafin_dho_${i}">Hora Final</label>
                                    <input id="horafin_dho_${i}" type="time" class="form-control @error('horafin_dho_${i}') is-invalid @enderror" wire:model="horafin_dho_${i}">
                                    @error('horafin_dho_${i}')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="dia_dho_${i}">Día</label>
                                    <input id="dia_dho_${i}" type="text" class="form-control @error('dia_dho_${i}') is-invalid @enderror" wire:model="dia_dho_${i}" required>
                                    @error('dia_dho_${i}')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="tipo_dho_${i}">Tipo</label>
                                    <input id="tipo_dho_${i}" type="text" class="form-control @error('tipo_dho_${i}') is-invalid @enderror" wire:model="tipo_dho_${i}" required>
                                    @error('tipo_dho_${i}')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    `;
                    i++;
                    detalles.insertAdjacentHTML( 'beforeend', str );
                }
            </script>
        </div>
    </form>
</div>
