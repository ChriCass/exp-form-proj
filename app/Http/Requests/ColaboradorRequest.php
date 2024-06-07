<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
            'codigo_tdoc' => 'required|exists:tipo_documentos,codigo_tdoc',
            'numerodoc_col' => 'required|string|max:16|unique:colaboradors,numerodoc_col',
            'apellidopaterno_col' => 'required|string|max:50',
            'apellidomaterno_col' => 'required|string|max:50',
            'nombres_col' => 'required|string|max:100',
            'codigo_sex' => 'nullable|exists:sexos,codigo_sex',
            'codigo_cgo' => 'nullable|exists:cargos,codigo_cgo',
            'codigo_rp' => 'nullable|exists:regimen_pensionarios,codigo_rp',
            'codigo_eps' => 'nullable|exists:eps,codigo_eps',
            'remuneracion_col' => 'nullable|numeric',
            'fechaingreso_col' => 'nullable|date',
            'fechacese_per' => 'nullable|date',
            'estado_col' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'codigo_tdoc.required' => 'El tipo de documento es obligatorio.',
            'codigo_tdoc.exists' => 'El tipo de documento seleccionado no es válido.',
            'numerodoc_col.required' => 'El número de documento es obligatorio.',
            'numerodoc_col.unique' => 'El número de documento ya está registrado.',
            'apellidopaterno_col.required' => 'El apellido paterno es obligatorio.',
            'apellidomaterno_col.required' => 'El apellido materno es obligatorio.',
            'nombres_col.required' => 'El nombre es obligatorio.',
            'codigo_sex.exists' => 'El sexo seleccionado no es válido.',
            'codigo_cgo.exists' => 'El cargo seleccionado no es válido.',
            'codigo_rp.exists' => 'El régimen pensionario seleccionado no es válido.',
            'codigo_eps.exists' => 'La EPS seleccionada no es válida.',
            'remuneracion_col.numeric' => 'La remuneración debe ser un número.',
            'fechaingreso_col.date' => 'La fecha de ingreso no es válida.',
            'fechacese_per.date' => 'La fecha de cese no es válida.',
            'estado_col.required' => 'El estado es obligatorio.',
            'estado_col.boolean' => 'El estado no es válido.',
        ];
    }
}
