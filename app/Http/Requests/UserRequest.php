<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = empty($this->id) ? 0 : $this->id;
        $rules = [
            'codigo_col' => 'required|exists:colaboradors,codigo_col',
            'codigo_rol' => 'required|exists:rols,codigo_rol',
            'nombre_usuario' => 'required|string',
            'email' => 'required|email',
            //'password' => 'max:255',
            'estado_usu' => 'required|boolean',
        ];

        // Si es cero, se esta agregando un registro
        if ($id == 0) {
            $rules = array_merge($rules, [
                'password' => ['required']
            ]);
        }

        if ($id <> 0 && $this->password) {
            $rules = array_merge($rules, [
                'password' => ['max:255']
            ]);
        }




        return $rules;
    }

    public function messages()
    {
        return [
            'codigo_col.required' => 'El colaborador es obligatorio.',
            'codigo_col.exists' => 'El colaborador seleccionada no es válida.',
            'codigo_rol.required' => 'El rol es obligatorio.',
            'codigo_rol.exists' => 'El rol seleccionada no es válida.',
            'nombre_usuario.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'El correo no es valido.',
            'password.required' => 'La contraseña es obligatoria.',
            'estado_usu.required' => 'El estado es obligatorio.',
            'estado_usu.boolean' => 'El estado no es válido.',
        ];
    }
}

