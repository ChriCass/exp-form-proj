<?php

namespace App\Livewire\AdminDashboard\Horarios;

use Livewire\Component;
use App\Http\Requests\HorarioRequest;
use App\Models\Horario;
use Illuminate\Support\Facades\Validator;
class HorarioForm extends Component
{
    public $horainicio_hor;
    public $horafin_hor;
    public $estado_hor;


    public function mount()
    {
        
    }

    public function submit()
    {
        $validatedData = Validator::make($this->all(), (new HorarioRequest)->rules())->validate();

        try {
            Horario::create($validatedData);
            session()->flash('success', 'Horario creado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un problema al crear el horario: ' . $e->getMessage());
        }

     
    }

    public function all()
    {
        return [
            'horainicio_hor' => $this->horainicio_hor,
            'horafin_hor' => $this->horafin_hor,
            'estado_hor' => $this->estado_hor,
        ];
    }
    public function render()
    {
        return view('livewire.admin-dashboard.horarios.horario-form');
    }
}
