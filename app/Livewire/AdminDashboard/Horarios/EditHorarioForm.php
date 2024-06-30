<?php

namespace App\Livewire\AdminDashboard\Horarios;

use Livewire\Component;
use App\Models\Horario;
use App\Http\Requests\ContratoColaboradorRequest;
use Illuminate\Support\Facades\Validator;

class EditHorarioForm extends Component
{
    public $codigo_hor;
    
    public $validatedData = []; // Propiedad para almacenar los datos validados

    protected $originalData = [];

    public function mount($codigo_hor)
    {
        $horario = Horario::findOrFail($codigo_hor);
        
        $this->originalData = [
        ];
    }

    public function submit()
    {
        $data = $this->validateRequest();
        $this->validatedData = $data; // Almacena los datos validados en la propiedad pública

        if ($data == $this->originalData) {
            session()->flash('warning', 'No se ha editado nada.');
        } else {
            Horario::findOrFail($this->codigo_hor)->update($data);
            session()->flash('success', 'Horario actualizado exitosamente.');
        }
    }

    protected function validateRequest()
    {
        // Ajustar el objeto request para incluir el código del colaborador
        $request = ContratoColaboradorRequest::createFromBase(request());
        $request->merge([
        ]);

        $request->setContainer(app())->setRedirector(app('redirect'));

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        return $validator->validate();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.horarios.edit-horario-form');
    }
}

