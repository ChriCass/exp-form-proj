<?php

namespace App\Livewire\AdminDashboard;

use Livewire\Component;
use App\Models\Colaborador;
class ActiveColaboradors extends Component
{   public $total;
    public $colaboradors;
    public function mount()
    {
        $this->colaboradors = Colaborador::where('estado_col', 'true')->get();
        $this->total = $this->colaboradors->count();
    }
    public function render()
    {
        return view('livewire.admin-dashboard.active-colaboradors');
    }
}
