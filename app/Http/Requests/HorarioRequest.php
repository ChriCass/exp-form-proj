<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HorarioRequest extends FormRequest
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
            'horainicio_hor' => 'nullable|date',
            'horafin_hor' => 'nullable|date',
            'estado_hor' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'horainicio_hor.time' => 'La hora de inicio no es válida.',
            'horafin_hor.time' => 'La hora final no es válida.',
            'estado_hor.boolean' => 'El estado no es válido.',
        ];
    }
}

