<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fecha' => 'required',
            'horario' => 'required',
            'practica' => 'required',
            'taller' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'fecha.required' => 'La fecha es requerida',
            'practica.required' => 'La práctica es requerida',
            'horario.required' => 'El horario es requerido',
            'taller.required' => 'El taller es requerido'
        ];
    }
}
