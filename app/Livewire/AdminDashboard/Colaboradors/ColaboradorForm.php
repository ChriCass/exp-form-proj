<?php

namespace App\Livewire\AdminDashboard\Colaboradors;

use Livewire\Component;
use App\Http\Requests\ColaboradorRequest;
use App\Models\Colaborador;
use App\Models\TipoDocumento;
use App\Models\Sexo;
use App\Models\Cargo;
use App\Models\RegimenPensionario;
use App\Models\Eps;
use Illuminate\Support\Facades\Validator;
class ColaboradorForm extends Component
{  public $tipoDocumentos;
    public $sexos;
    public $cargos;
    public $regimenesPensionarios;
    public $epss;

    public $codigo_tdoc;
    public $numerodoc_col;
    public $apellidopaterno_col;
    public $apellidomaterno_col;
    public $nombres_col;
    public $codigo_sex;
    public $codigo_cgo;
    public $codigo_rp;
    public $codigo_eps;
    public $remuneracion_col;
    public $fechaingreso_col;
    public $fechacese_per;
    public $estado_col;


    public function mount()
    {
        $this->tipoDocumentos = TipoDocumento::all();
        $this->sexos = Sexo::all();
        $this->cargos = Cargo::all();
        $this->regimenesPensionarios = RegimenPensionario::all();
        $this->epss = Eps::all();
    }

    public function submit()
    {
        $validatedData = Validator::make($this->all(), (new ColaboradorRequest)->rules())->validate();

        try {
            Colaborador::create($validatedData);
            session()->flash('success', 'Colaborador creado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un problema al crear el colaborador: ' . $e->getMessage());
        }

     
    }

    public function all()
    {
        return [
            'codigo_tdoc' => $this->codigo_tdoc,
            'numerodoc_col' => $this->numerodoc_col,
            'apellidopaterno_col' => $this->apellidopaterno_col,
            'apellidomaterno_col' => $this->apellidomaterno_col,
            'nombres_col' => $this->nombres_col,
            'codigo_sex' => $this->codigo_sex,
            'codigo_cgo' => $this->codigo_cgo,
            'codigo_rp' => $this->codigo_rp,
            'codigo_eps' => $this->codigo_eps,
            'remuneracion_col' => $this->remuneracion_col,
            'fechaingreso_col' => $this->fechaingreso_col,
            'fechacese_per' => $this->fechacese_per,
            'estado_col' => $this->estado_col,
        ];
    }
    public function render()
    {
        return view('livewire.admin-dashboard.colaboradors.colaborador-form');
    }
}
