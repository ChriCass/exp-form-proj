<?php

namespace App\Livewire\AdminDashboard\Users;

use Livewire\Component;
use App\Http\Requests\UserRequest;
use App\Models\Colaborador;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserForm extends Component
{
    public $colaboradores;
    public $roles;

    public $codigo_col;
    public $codigo_rol;
    public $nombre_usuario;
    public $email;
    public $password;
    public $estado_usu;

    public $errorMessages = [];

    public function mount()
    {
        Log::info('Mounting the component');
        $this->colaboradores = Colaborador::all();
        $this->roles = Rol::all();
    }

    public function submit()
    {
        Log::info('Submit function called');

        $formData = $this->all();
        Log::info('Form data', $formData);

        $rules = (new UserRequest)->rules();
        $messages = (new UserRequest)->messages();

        $validator = Validator::make($formData, $rules, $messages);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            $this->errorMessages = $validator->errors()->all();
            $this->setErrorBag($validator->errors());
            return;
        }

        try {
            Log::info('Validation passed, creating Colaborador');
            User::create($validator->validated());
            session()->flash('success', 'Colaborador creado exitosamente.');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error('Exception caught', ['exception' => $e]);
            session()->flash('error', 'Hubo un problema al crear el usuario: ' . $e->getMessage());
            return redirect()->route('users.index');
        }
    }

    public function all()
    {
        Log::info('Gathering all form data');
        return [
            'codigo_col' => $this->codigo_col,
            'codigo_rol' => $this->codigo_rol,
            'nombre_usuario' => $this->nombre_usuario,
            'email' => $this->email,
            'password' => $this->password,
            'estado_usu' => $this->estado_usu,
        ];
    }

    public function render()
    {
        Log::info('Rendering the component');
        return view('livewire.admin-dashboard.users.user-form');
    }
}
