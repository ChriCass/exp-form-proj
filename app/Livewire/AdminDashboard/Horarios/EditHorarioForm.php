<?php

namespace App\Livewire\AdminDashboard\Contratos;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\ContratoColaborador;
use App\Models\TipoDocumento;
use App\Models\Sexo;
use App\Models\Cargo;
use App\Models\RegimenPensionario;
use App\Models\Eps;
use App\Http\Requests\ColaboradorRequest;
use Illuminate\Support\Facades\Validator;

class EditContratoForm extends Component
{
    public $codigo_col;
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

    public $tipoDocumentos;
    public $sexos;
    public $cargos;
    public $regimenesPensionarios;
    public $epss;

    public $validatedData = []; // Propiedad para almacenar los datos validados

    protected $originalData = [];

    public function mount($codigo_col)
    {
        $colaborador = Colaborador::findOrFail($codigo_col);

        $this->codigo_col = $colaborador->codigo_col;
        $this->codigo_tdoc = $colaborador->codigo_tdoc;
        $this->numerodoc_col = $colaborador->numerodoc_col;
        $this->apellidopaterno_col = $colaborador->apellidopaterno_col;
        $this->apellidomaterno_col = $colaborador->apellidomaterno_col;
        $this->nombres_col = $colaborador->nombres_col;
        $this->codigo_sex = $colaborador->codigo_sex;
        $this->codigo_cgo = $colaborador->codigo_cgo;
        $this->codigo_rp = $colaborador->codigo_rp;
        $this->codigo_eps = $colaborador->codigo_eps;
        $this->remuneracion_col = $colaborador->remuneracion_col;
        $this->fechaingreso_col = $colaborador->fechaingreso_col;
        $this->fechacese_per = $colaborador->fechacese_per;
        $this->estado_col = $colaborador->estado_col;

        $this->tipoDocumentos = TipoDocumento::all();
        $this->sexos = Sexo::all();
        $this->cargos = Cargo::all();
        $this->regimenesPensionarios = RegimenPensionario::all();
        $this->epss = Eps::all();

        $this->originalData = [
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

    public function submit()
    {
        $data = $this->validateRequest();
        $this->validatedData = $data; // Almacena los datos validados en la propiedad pública

        if ($data == $this->originalData) {
            session()->flash('warning', 'No se ha editado nada.');
        } else {
            Colaborador::findOrFail($this->codigo_col)->update($data);
            session()->flash('success', 'Colaborador actualizado exitosamente.');
        }
    }

    protected function validateRequest()
    {
        // Ajustar el objeto request para incluir el código del colaborador
        $request = ColaboradorRequest::createFromBase(request());
        $request->merge([
            'codigo_col' => $this->codigo_col,
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
        ]);

        $request->setContainer(app())->setRedirector(app('redirect'));

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        return $validator->validate();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.colaboradors.edit-colaborador-form');
    }
}

