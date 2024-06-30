<?php

namespace App\Livewire\AdminDashboard\Horarios;

use Livewire\Component;
use App\Models\Horario;
use App\Models\DetalleHorario;
use Illuminate\Support\Facades\DB;

class HorarioForm extends Component
{
    public $horainicio_hor;
    public $horafin_hor;
    public $estado_hor = 1;

    public $detalles = [];
    public $showDetalles = false;

    public function mount()
    {
        $this->detalles = [];
    }

    public function addDetalle()
    {
        $this->detalles[] = [
            'dia_dho' => '',
            'tipo_dho' => '',
            'horainicio_dho' => '',
            'horafin_dho' => '',
            'estado_dho' => 1,
        ];
        $this->showDetalles = true;
    }

    public function removeDetalle($index)
    {
        unset($this->detalles[$index]);
        $this->detalles = array_values($this->detalles);

        if (empty($this->detalles)) {
            $this->showDetalles = false;
        }
    }

    public function submit()
    {
        $rules = [
            'horainicio_hor' => 'required|date_format:H:i',
            'horafin_hor' => 'required|date_format:H:i',
            'estado_hor' => 'required|boolean',
        ];

        if (!empty($this->detalles)) {
            $rules['detalles.*.dia_dho'] = 'required|string';
            $rules['detalles.*.tipo_dho'] = 'required|string';
            $rules['detalles.*.horainicio_dho'] = 'required|date_format:H:i';
            $rules['detalles.*.horafin_dho'] = 'required|date_format:H:i';
            $rules['detalles.*.estado_dho'] = 'required|boolean';
        }

        $validatedData = $this->validate($rules);

        DB::transaction(function () use ($validatedData) {
            $horario = Horario::create([
                'horainicio_hor' => $validatedData['horainicio_hor'],
                'horafin_hor' => $validatedData['horafin_hor'],
                'estado_hor' => $validatedData['estado_hor'],
            ]);

            if (!empty($validatedData['detalles'])) {
                foreach ($validatedData['detalles'] as $detalle) {
                    DetalleHorario::create([
                        'codigo_hor' => $horario->codigo_hor,
                        'dia_dho' => $detalle['dia_dho'],
                        'tipo_dho' => $detalle['tipo_dho'],
                        'horainicio_dho' => $detalle['horainicio_dho'],
                        'horafin_dho' => $detalle['horafin_dho'],
                        'estado_dho' => $detalle['estado_dho'],
                    ]);
                }
            }
        });

        return redirect()->route('horarios.index');
    }

    public function render()
    {
        return view('livewire.admin-dashboard.horarios.horario-form');
    }
}
