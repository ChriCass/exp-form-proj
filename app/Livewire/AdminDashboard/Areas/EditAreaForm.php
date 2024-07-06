<?php

namespace App\Livewire\AdminDashboard\areas;

use Livewire\Component;
use App\Models\Area;
use App\Http\Requests\AreaRequest;
use Illuminate\Support\Facades\Validator;

class EditAreaForm extends Component
{
    public $codigo_are;
    public $nombre_are;
    public $abreviatura_are;
    public $estado_are;

    public $originalData = [];
    public $validatedData = [];

    public function mount($codigo_are)
    {
        $area = Area::findOrFail($codigo_are);

        $this->nombre_are = $area->nombre_are;
        $this->abreviatura_are = $area->abreviatura_are;
        $this->estado_are = $area->estado_are ? 1 : 0;

        $this->originalData = [
            'nombre_col' => $this->nombre_are,
            'abreviatura_sex' => $this->abreviatura_are,
            'estado_are' => $this->estado_are,
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
            $area = area::findOrFail($this->codigo_are);
            $area->update($data);

            // Redirigir a la lista de areaes con un mensaje de éxito
            return redirect()->route('areas.index')->with('success', 'area actualizada exitosamente.');
        }
    }


    protected function validateRequest()
    {
        $request = areaRequest::createFromBase(request());
        $request->merge([
            'nombre_are' => $this->nombre_are,
            'abreviatura_are' => $this->abreviatura_are,
            'estado_are' => $this->estado_are,
        ]);

        $request->setContainer(app())->setRedirector(app('redirect'));

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        return $validator->validate();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.areas.edit-area-form');
    }
}
