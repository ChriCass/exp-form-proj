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
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ColaboradorForm extends Component
{
    public $tipoDocumentos;
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
    public $email;

    public $errorMessages = [];

    public function mount()
    {
        Log::info('Mounting the component');
        $this->tipoDocumentos = TipoDocumento::all();
        $this->sexos = Sexo::all();
        $this->cargos = Cargo::all();
        $this->regimenesPensionarios = RegimenPensionario::all();
        $this->epss = Eps::all();
    }

    public function submit()
    {
        Log::info('Submit function called');

        $formData = $this->all();
        Log::info('Form data', $formData);

        $rules = (new ColaboradorRequest)->rules();
        $messages = (new ColaboradorRequest)->messages();

        $validator = Validator::make($formData, $rules, $messages);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            $this->errorMessages = $validator->errors()->all();
            $this->setErrorBag($validator->errors());
            return;
        }

        try {
            Log::info('Validation passed, creating Colaborador');

            DB::transaction(function () use($validator) {
            $colab = Colaborador::create($validator->validated());

            $data = $validator->validated();
            User::create([
                'nombre_usuario' => $data['nombres_col'],
                'email' => $data['email'],
                'password' => $data['numerodoc_col'],
                'codigo_col' => $colab->codigo_col,
                'codigo_rol' => 2,
                'estado_usu' => 1,
            ]);
            });

            session()->flash('success', 'Colaborador creado exitosamente.');
            return redirect()->route('colaboradors.index');
        } catch (\Exception $e) {
            Log::error('Exception caught', ['exception' => $e]);
            session()->flash('error', 'Hubo un problema al crear el colaborador: ' . $e->getMessage());
            return redirect()->route('colaboradors.index');
        }
    }

    public function all()
    {
        Log::info('Gathering all form data');
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
            'email' => $this->email,
        ];
    }

    public function render()
    {
        Log::info('Rendering the component');
        return view('livewire.admin-dashboard.colaboradors.colaborador-form');
    }
}
