<?php

namespace App\Livewire\AdminDashboard;
use App\Models\Colaborador;
use Livewire\Component;

class AllColaboradors extends Component
{   public $colaboradores;
    public function mount(){
        $this->colaboradores = Colaborador::count();
    }
    public function render()
    {
        return view('livewire.admin-dashboard.all-colaboradors',  [
            'colaboradores' => $this->colaboradores
        ]);
    }
}
