<?php

namespace App\Livewire\AdminDashboard\Contratos;

use Livewire\Component;
use App\Models\ContratoColaborador;
use App\Models\Colaborador;
use App\Models\Horario;
use Illuminate\Support\Facades\Validator;

class EditContratoForm extends Component
{
    public $contrato;
    public $colaboradores;
    public $horarios;

    public $codigo_col;
    public $codigo_hor;
    public $fechainicio_cco;
    public $fechafin_cco;
    public $remuneracion_cco;
    public $estado_cto;

    public $originalData = [];

    public function mount($codigo_cco)
    {
        $this->contrato = ContratoColaborador::findOrFail($codigo_cco);

        $this->colaboradores = Colaborador::where('estado_col', true)
            ->whereDoesntHave('contratos', function($query) use ($codigo_cco) {
                $query->where('codigo_cco', '!=', $codigo_cco);
            })
            ->get();

        $this->horarios = Horario::all();

        $this->codigo_col = $this->contrato->codigo_col;
        $this->codigo_hor = $this->contrato->codigo_hor;
        $this->fechainicio_cco = $this->contrato->fechainicio_cco;
        $this->fechafin_cco = $this->contrato->fechafin_cco;
        $this->remuneracion_cco = $this->contrato->remuneracion_cco;
        $this->estado_cto = $this->contrato->estado_cto ? '1' : '0';

        $this->originalData = [
            'codigo_col' => $this->codigo_col,
            'codigo_hor' => $this->codigo_hor,
            'fechainicio_cco' => $this->fechainicio_cco,
            'fechafin_cco' => $this->fechafin_cco,
            'remuneracion_cco' => $this->remuneracion_cco,
            'estado_cto' => $this->estado_cto,
        ];
    }

    public function submit()
    {
        $validatedData = Validator::make($this->all(), [
            'codigo_col' => 'required',
            'codigo_hor' => 'required',
            'fechainicio_cco' => 'required|date',
            'fechafin_cco' => 'nullable|date',
            'remuneracion_cco' => 'required|numeric',
            'estado_cto' => 'required|in:0,1',
        ])->validate();

        // Verificar si los datos son iguales a los originales
        if ($validatedData == $this->originalData) {
            session()->flash('warning', 'No hay cambios por actualizar.');
            return;
        }

        try {
            $this->contrato->update($validatedData);
            return redirect()->route('contratos.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un problema al actualizar el contrato: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin-dashboard.contratos.edit-contrato-form');
    }
}
