<?php

namespace App\Livewire\AdminDashboard\cargos;

use Livewire\Component;
use App\Models\Cargo;
use App\Models\Area;
use App\Http\Requests\cargoRequest;
use Illuminate\Support\Facades\Validator;

class EditCargoForm extends Component
{
    public $areas;

    public $codigo_cgo;
    public $codigo_are;
    public $nombre_cgo;
    public $abreviatura_cgo;
    public $estado_cgo;

    public $originalData = [];
    public $validatedData = [];

    public function mount($codigo_cgo)
    {
        $cargo = Cargo::findOrFail($codigo_cgo);

        $this->codigo_cgo = $cargo->codigo_cgo;
        $this->codigo_are = $cargo->codigo_are;
        $this->nombre_cgo = $cargo->nombre_cgo;
        $this->abreviatura_cgo = $cargo->abreviatura_cgo;
        $this->estado_cgo = $cargo->estado_cgo ? 1 : 0;

        $this->areas = Area::all();

        $this->originalData = [
            'codigo_cgo' => $this->codigo_cgo,
            'codigo_are' => $this->codigo_are,
            'nombre_cgo' => $this->nombre_cgo,
            'abreviatura_cgo' => $this->abreviatura_cgo,
            'estado_cgo' => $this->estado_cgo,
        ];

        // Debug: Registrar datos originales
        logger()->info('Datos originales en mount: ', $this->originalData);
    }

    public function submit()
    {
        $data = $this->validateRequest();
        $this->validatedData = $data; // Almacena los datos validados en la propiedad pública

        // Debug: Verificar los datos originales y los datos actuales
        logger()->info('Datos originales al enviar: ', $this->originalData);
        logger()->info('Datos actuales al enviar: ', $data);

        // Verificar si hay cambios
        if ($data == $this->originalData) {
            session()->flash('warning', 'No hay nada que actualizar.');
        } else {
            $cargo = cargo::findOrFail($this->codigo_cgo);
            $cargo->update($data);

            // Redirigir a la lista de cargoes con un mensaje de éxito
            return redirect()->route('cargos.index')->with('success', 'cargo actualizado exitosamente.');
        }
    }


    protected function validateRequest()
    {
        $request = cargoRequest::createFromBase(request());
        $request->merge([
            'codigo_cgo' => $this->codigo_cgo,
            'codigo_are' => $this->codigo_are,
            'nombre_cgo' => $this->nombre_cgo,
            'abreviatura_cgo' => $this->abreviatura_cgo,
            'estado_cgo' => $this->estado_cgo,
        ]);

        $request->setContainer(app())->setRedirector(app('redirect'));

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        return $validator->validate();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.cargos.edit-cargo-form');
    }
}
