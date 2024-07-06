<?php

namespace App\Livewire\AdminDashboard\users;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Rol;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;

class EditUserForm extends Component
{
    public $colaboradores;
    public $roles;

    public $id;
    public $codigo_col;
    public $codigo_rol;
    public $nombre_usuario;
    public $email;
    public $password;
    public $estado_usu;

    public $originalData = [];
    public $validatedData = [];

    public function mount($id)
    {
        $this->colaboradores = Colaborador::all();
        $this->roles = Rol::all();

        $user = User::findOrFail($id);



        $this->codigo_col = $user->codigo_col;
        $this->codigo_rol = $user->codigo_rol;
        $this->nombre_usuario = $user->nombre_usuario;
        $this->email = $user->email;
        //$this->password = $user->password;
        $this->estado_usu = $user->estado_usu ? 1 : 0;


        $this->originalData = [
            'id' => $this->id,
            'codigo_col' => $this->codigo_col,
            'codigo_rol' => $this->codigo_rol,
            'nombre_usuario' => $this->nombre_usuario,
            'email' => $this->email,
            'password' => $this->password,
            'estado_usu' => $this->estado_usu,
        ];

        // Debug: Registrar datos originales
        logger()->info('Datos originales en mount: ', $this->originalData);
    }

    public function submit()
    {
        $data = $this->validateRequest();
        $this->validatedData = $data; // Almacena los datos validados en la propiedad pública

        // Debug: Verificar los datos originales y los datos actuales
        logger()->info('Datos originales al enviar: ', $this->originalData);
        logger()->info('Datos actuales al enviar: ', $data);

        // Verificar si hay cambios
        if ($data == $this->originalData) {
            session()->flash('warning', 'No hay nada que actualizar.');
        } else {
            $user = User::findOrFail($this->id);
            $user->update($data);

            // Redirigir a la lista de cargoes con un mensaje de éxito
            return redirect()->route('users.index')->with('success', 'usuario actualizado exitosamente.');
        }
    }


    protected function validateRequest()
    {
        $request = UserRequest::createFromBase(request());
        $request->merge([
            'id' => $this->id,
            'codigo_col' => $this->codigo_col,
            'codigo_rol' => $this->codigo_rol,
            'nombre_usuario' => $this->nombre_usuario,
            'email' => $this->email,
            'password' => $this->password,
            'estado_usu' => $this->estado_usu,
        ]);

        $request->setContainer(app())->setRedirector(app('redirect'));

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        return $validator->validate();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.users.edit-user-form');
    }
}
