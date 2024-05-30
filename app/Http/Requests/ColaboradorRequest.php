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
            'numerodoc_col' => 'required|string|max:16',
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
}
