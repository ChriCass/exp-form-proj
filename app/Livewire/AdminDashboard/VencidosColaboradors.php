<?php

namespace App\Livewire\AdminDashboard;

use Livewire\Component;
use App\Models\ContratoColaborador;
use Carbon\Carbon;

class VencidosColaboradors extends Component
{
    public $contratos;

    public function mount()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $this->contratos = ContratoColaborador::join('colaboradors', 'colaboradors.codigo_col', '=', 'contrato_colaboradors.codigo_col')
            ->join('cargos', 'cargos.codigo_cgo', '=', 'colaboradors.codigo_cgo')
            ->join('areas', 'areas.codigo_are', '=', 'cargos.codigo_are')
            ->select('colaboradors.nombres_col', 'colaboradors.apellidopaterno_col', 'cargos.nombre_cgo', 'areas.nombre_are', 'contrato_colaboradors.fechainicio_cco', 'contrato_colaboradors.fechafin_cco')
            ->whereMonth('contrato_colaboradors.fechafin_cco', $currentMonth)
            ->whereYear('contrato_colaboradors.fechafin_cco', $currentYear)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.vencidos-colaboradors', [
            'contratos' => $this->contratos
        ]);
    }
}
