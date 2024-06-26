<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContratoColaboradorRequest extends FormRequest
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
        return [
            'codigo_col' => 'required|exists:colaboradors,codigo_col',
            'codigo_hor' => 'required|exists:horarios,codigo_hor',
            'fechainicio_cco' => 'nullable|date',
            'fechafin_cco' => 'nullable|date',
            'remuneracion_cco' => 'required|numeric',
            'estado_cto' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'codigo_col.required' => 'El colaborador es obligatorio.',
            'codigo_col.exists' => 'El colaborador seleccionado no es válido.',
            'codigo_hor.required' => 'El horario es obligatorio.',
            'codigo_hor.exists' => 'El horario seleccionado no es válido.',
            'fechainicio_cco.date' => 'La fecha de inicio no es válida.',
            'fechafin_cco.date' => 'La fecha final no es válida.',
            'remuneracion_cco.numeric' => 'La remuneración debe ser un número.',
            'estado_cco.required' => 'El estado es obligatorio.',
            'estado_cco.boolean' => 'El estado no es válido.',
        ];
    }
}

