<?php

namespace App\Livewire\AdminDashboard\Contratos;

use Livewire\Component;
use App\Models\ContratoColaborador;
use App\Models\Colaborador;
use App\Models\Horario;
use App\Http\Requests\ContratoColaboradorRequest;
use Illuminate\Support\Facades\Validator;

class EditContratoForm extends Component
{
    public $colaboradores;
    public $horarios;

    public $codigo_cco;
    public $codigo_col;
    public $codigo_hor;
    public $fechainicio_cco;
    public $fechafin_cco;
    public $remuneracion_cco;
    public $estado_cto;

    public $validatedData = []; // Propiedad para almacenar los datos validados

    protected $originalData = [];

    public function mount($codigo_cco)
    {
        $contrato = ContratoColaborador::findOrFail($codigo_cco);

        $this->codigo_col = $contrato->codigo_col;
        $this->codigo_hor = $contrato->codigo_hor;
        $this->fechainicio_cco = $contrato->fechainicio_cco;
        $this->fechafin_cco = $contrato->fechafin_cco;
        $this->remuneracion_cco = $contrato->remuneracion_cco;
        $this->estado_cto = $contrato->estado_cto;

        $this->colaboradores = Colaborador::all();
        $this->horarios = Horario::all();
        
        $this->originalData = [
            'codigo_col' => $this->codigo_col,
            'codigo_hor' => $this->codigo_hor,
            'fechainicio_cco' => $this->fechainicio_cco,
            'fechafin_cco' => $this->fechafin_cco,
            'remuneracion_cco' => $this->remuneracion_cco,
            'estado_cto' => $this->estado_cto
        ];
    }

    public function submit()
    {
        $data = $this->validateRequest();
        $this->validatedData = $data; // Almacena los datos validados en la propiedad pública

        if ($data == $this->originalData) {
            session()->flash('warning', 'No se ha editado nada.');
        } else {
            ContratoColaborador::findOrFail($this->codigo_cco)->update($data);
            session()->flash('success', 'Contrato actualizado exitosamente.');
        }
    }

    protected function validateRequest()
    {
        // Ajustar el objeto request para incluir el código del colaborador
        $request = ContratoColaboradorRequest::createFromBase(request());
        $request->merge([
            'codigo_cco' => $this->codigo_cco,
            'codigo_col' => $this->codigo_col,
            'codigo_hor' => $this->codigo_hor,
            'fechainicio_cco' => $this->fechainicio_cco,
            'fechafin_cco' => $this->fechafin_cco,
            'remuneracion_cco' => $this->remuneracion_cco,
            'estado_cto' => $this->estado_cto
        ]);

        $request->setContainer(app())->setRedirector(app('redirect'));

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        return $validator->validate();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.contratos.edit-contrato-form');
    }
}

