<?php

namespace App\Livewire\AdminDashboard;
use App\Models\Colaborador;
use Livewire\Component;
use Carbon\Carbon;
class NewColaboradors extends Component
{   
    
    public $nuevos;
    public function mount(){
        $this->nuevos = Colaborador::whereMonth('fechaingreso_col', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->count();
      
    }
    public function render()
    {
        return view('livewire.admin-dashboard.new-colaboradors', [
            'nuevos' => $this->nuevos
        ]);
    }
}
