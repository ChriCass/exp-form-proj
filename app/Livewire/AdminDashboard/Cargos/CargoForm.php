<?php

namespace App\Livewire\AdminDashboard\Cargos;

use Livewire\Component;
use App\Http\Requests\CargoRequest;
use App\Models\Area;
use App\Models\Cargo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CargoForm extends Component
{
    public $areas;

    public $codigo_are;
    public $nombre_cgo;
    public $abreviatura_cgo;
    public $estado_cgo;

    public $errorMessages = [];

    public function mount()
    {
        Log::info('Mounting the component');
        $this->areas = Area::all();
    }

    public function submit()
    {
        Log::info('Submit function called');

        $formData = $this->all();
        Log::info('Form data', $formData);

        $rules = (new CargoRequest)->rules();
        $messages = (new CargoRequest)->messages();

        $validator = Validator::make($formData, $rules, $messages);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            $this->errorMessages = $validator->errors()->all();
            $this->setErrorBag($validator->errors());
            return;
        }

        try {
            Log::info('Validation passed, creating Colaborador');
            Cargo::create($validator->validated());
            session()->flash('success', 'Colaborador creado exitosamente.');
            return redirect()->route('cargos.index');
        } catch (\Exception $e) {
            Log::error('Exception caught', ['exception' => $e]);
            session()->flash('error', 'Hubo un problema al crear el cargo: ' . $e->getMessage());
            return redirect()->route('cargos.index');
        }
    }

    public function all()
    {
        Log::info('Gathering all form data');
        return [
            'codigo_are' => $this->codigo_are,
            'nombre_cgo' => $this->nombre_cgo,
            'abreviatura_cgo' => $this->abreviatura_cgo,
            'estado_cgo' => $this->estado_cgo,
        ];
    }

    public function render()
    {
        Log::info('Rendering the component');
        return view('livewire.admin-dashboard.cargos.cargo-form');
    }
}
