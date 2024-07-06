<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AreaRequest extends FormRequest
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
            'nombre_are' => 'required|string|max:120',
            'abreviatura_are' => 'required|string|max:10',
            'estado_are' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'nombre_are.required' => 'El nombre es obligatorio.',
            'abreviatura_are.required' => 'La abreviatura es obligatorio.',
            'estado_are.required' => 'El estado es obligatorio.',
            'estado_are.boolean' => 'El estado no es válido.',
        ];
    }
}

