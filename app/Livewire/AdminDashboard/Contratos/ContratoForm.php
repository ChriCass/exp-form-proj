<?php

namespace App\Livewire\AdminDashboard\Contratos;

use Livewire\Component;
use App\Http\Requests\ContratoColaboradorRequest;
use App\Models\ContratoColaborador;
use App\Models\Colaborador;
use App\Models\Horario;
use Illuminate\Support\Facades\Validator;
class ContratoForm extends Component
{
    public $colaboradores;
    public $horarios;

    public $codigo_col;
    public $codigo_hor;
    public $fechainicio_cco;
    public $fechafin_cco;
    public $remuneracion_cco;
    public $estado_cco;


    public function mount()
    {
        $this->colaboradores = Colaborador::all();
        $this->horarios = Horario::all();
    }

    public function submit()
    {
        $validatedData = Validator::make($this->all(), (new ContratoColaboradorRequest)->rules())->validate();

        try {
            ContratoColaborador::create($validatedData);
            session()->flash('success', 'Contrato creado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un problema al crear el contrato: ' . $e->getMessage());
        }

     
    }

    public function all()
    {
        return [
            'codigo_col' => $this->codigo_col,
            'codigo_hor' => $this->codigo_hor,
            'fechainicio_cco' => $this->fechainicio_cco,
            'fechafin_cco' => $this->fechafin_cco,
            'remuneracion_cco' => $this->remuneracion_cco,
            'estado_cco' => $this->estado_cco,
        ];
    }
    public function render()
    {
        return view('livewire.admin-dashboard.contratos.contrato-form');
    }
}
