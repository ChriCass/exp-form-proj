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


            <!-- Submit Button -->
            <div class="col-lg-12 p-t-20 text-center">
                <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                <button type="reset" class="btn btn-danger waves-effect">Cancel</button>
            </div>
        </div>
    </form>
</div>
