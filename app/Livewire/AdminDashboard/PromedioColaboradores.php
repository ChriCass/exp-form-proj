<?php

namespace App\Livewire\AdminDashboard;
use App\Models\Colaborador;
use Livewire\Component;
use App\Models\Cargo;
use App\Models\Area;
class PromedioColaboradores extends Component
{
    
    public function render()
    {
        return view('livewire.admin-dashboard.promedio-colaboradores');
    }
}
