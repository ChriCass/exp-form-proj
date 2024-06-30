<?php

namespace App\Livewire\AdminDashboard\Contratos;

use Livewire\Component;
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
    public $estado_cto;

    public function mount()
    {
        // Obtener colaboradores activos que no tienen contrato
        $this->colaboradores = Colaborador::where('estado_col', true)
            ->whereDoesntHave('contratos')
            ->get();

        $this->horarios = Horario::all();
    }

    public function submit()
    {
        $validatedData = Validator::make($this->all(), [
            'codigo_col' => 'required',
            'codigo_hor' => 'required',
            'fechafin_cco' => 'nullable|date',
            'remuneracion_cco' => 'required|numeric',
            'estado_cto' => 'required|in:0,1',
        ])->validate();

        try {
            ContratoColaborador::create($validatedData);
            return redirect()->route('contratos.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un problema al crear el contrato: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin-dashboard.contratos.contrato-form');
    }
}
