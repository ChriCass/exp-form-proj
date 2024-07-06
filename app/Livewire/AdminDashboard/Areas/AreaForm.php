<?php

namespace App\Livewire\AdminDashboard\Areas;

use Livewire\Component;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AreaForm extends Component
{
    public $nombre_are;
    public $abreviatura_are;
    public $estado_are;

    public $errorMessages = [];

    public function mount()
    {
        Log::info('Mounting the component');
    }

    public function submit()
    {
        Log::info('Submit function called');

        $formData = $this->all();
        Log::info('Form data', $formData);

        $rules = (new AreaRequest)->rules();
        $messages = (new AreaRequest)->messages();

        $validator = Validator::make($formData, $rules, $messages);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            $this->errorMessages = $validator->errors()->all();
            $this->setErrorBag($validator->errors());
            return;
        }

        try {
            Log::info('Validation passed, creating Colaborador');
            Area::create($validator->validated());
            session()->flash('success', 'Area creado exitosamente.');
            return redirect()->route('areas.index');
        } catch (\Exception $e) {
            Log::error('Exception caught', ['exception' => $e]);
            session()->flash('error', 'Hubo un problema al crear el area: ' . $e->getMessage());
            return redirect()->route('areas.index');
        }
    }

    public function all()
    {
        Log::info('Gathering all form data');
        return [
            'nombre_are' => $this->nombre_are,
            'abreviatura_are' => $this->abreviatura_are,
            'estado_are' => $this->estado_are,
        ];
    }

    public function render()
    {
        Log::info('Rendering the component');
        return view('livewire.admin-dashboard.areas.area-form');
    }
}
