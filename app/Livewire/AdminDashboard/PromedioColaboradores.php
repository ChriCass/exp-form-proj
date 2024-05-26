<?php

namespace App\Livewire\AdminDashboard;
use App\Models\Colaborador;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Cargo;
use App\Models\Area;
class PromedioColaboradores extends Component
{
    
    public $promedioPorArea;

    public function mount()
    {
        // Obtener el número total de colaboradores por área
        $colaboradoresPorArea = Colaborador::join('cargos', 'colaboradors.codigo_cgo', '=', 'cargos.codigo_cgo')
                                            ->join('areas', 'cargos.codigo_are', '=', 'areas.codigo_are')
                                            ->select('areas.codigo_are', DB::raw('count(colaboradors.codigo_col) as total_colaboradores'))
                                            ->groupBy('areas.codigo_are')
                                            ->get();

        // Calcular el promedio de colaboradores por área
        $totalAreas = $colaboradoresPorArea->count();
        $totalColaboradores = $colaboradoresPorArea->sum('total_colaboradores');
        
        $this->promedioPorArea = ($totalAreas > 0) ? $totalColaboradores / $totalAreas : 0;
    }

    public function render()
    {
        return view('livewire.admin-dashboard.promedio-colaboradores', [
            'promedioPorArea' => $this->promedioPorArea,
        ]);
    }
}
