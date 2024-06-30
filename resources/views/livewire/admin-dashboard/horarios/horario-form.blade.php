<div>
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="horainicio_hor">Hora de Inicio del Horario</label>
            <input type="time" class="form-control" id="horainicio_hor" wire:model="horainicio_hor">
            @error('horainicio_hor') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="horafin_hor">Hora de Fin del Horario</label>
            <input type="time" class="form-control" id="horafin_hor" wire:model="horafin_hor">
            @error('horafin_hor') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="estado_hor">Estado</label>
            <select class="form-control" id="estado_hor" wire:model="estado_hor">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            @error('estado_hor') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="button" class="btn btn-primary mb-3" wire:click="addDetalle">Añadir Detalle</button>

        @if($showDetalles)
            <div class="form-group row" style="margin-top: 15px;margin-bottom: -5px !important;">
                <label class="col-sm-2 col-form-label">Día</label>
                <label class="col-sm-2 col-form-label">Tipo</label>
                <label class="col-sm-2 col-form-label">Hora de Inicio</label>
                <label class="col-sm-2 col-form-label">Hora de Fin</label>
                <label class="col-sm-2 col-form-label">Estado</label>
                <label class="col-sm-2 col-form-label">Acciones</label>
            </div>
            @foreach($detalles as $index => $detalle)
                <div class="form-group row align-items-center">
                    <div class="col-sm-2">
                        <input type="text" class="form-control" wire:model="detalles.{{ $index }}.dia_dho">
                        @error('detalles.'.$index.'.dia_dho') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" wire:model="detalles.{{ $index }}.tipo_dho">
                        @error('detalles.'.$index.'.tipo_dho') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-2">
                        <input type="time" class="form-control" wire:model="detalles.{{ $index }}.horainicio_dho">
                        @error('detalles.'.$index.'.horainicio_dho') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-2">
                        <input type="time" class="form-control" wire:model="detalles.{{ $index }}.horafin_dho">
                        @error('detalles.'.$index.'.horafin_dho') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control" wire:model="detalles.{{ $index }}.estado_dho">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        @error('detalles.'.$index.'.estado_dho') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-2 text-right">
                        <button type="button" class="btn btn-danger" wire:click="removeDetalle({{ $index }})">Eliminar Detalle</button>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="text-right mt-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
