<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CargoRequest extends FormRequest
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
        $colaboradorId = $this->route('codigo_col') ?? $this->codigo_col;

        return [
            'codigo_are' => 'required|exists:areas,codigo_are',
            'nombre_cgo' => 'required|string|max:100',
            'abreviatura_cgo' => 'required|string|max:5',
            'estado_cgo' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'codigo_are.required' => 'El area es obligatorio.',
            'codigo_are.exists' => 'El area seleccionada no es válida.',
            'nombre_cgo.required' => 'El nombre es obligatorio.',
            'abreviatura_cgo.required' => 'La abreviatura es obligatorio.',
            'abreviatura_cgo.max' => 'La abreviatura solo acepta un maximo de 5 caracteres.',
            'estado_cgo.required' => 'El estado es obligatorio.',
            'estado_cgo.boolean' => 'El estado no es válido.',
        ];
    }
}

