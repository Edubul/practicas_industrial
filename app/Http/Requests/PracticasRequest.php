<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticasRequest extends FormRequest
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
            'profesores' => [],
            'materia' => ['required'],
            'unidad' => ['required'],
            'tema' => ['required'],
            'nombre_practica' => ['required'],
            'atributo_egreso' => ['required'],
            'req_ub_op1' => ['required'],
            'req_ub_op2' => [],
            'equipo_prot' => ['required'],
            'maq_usar' => ['required'],
            'inst_med' => [],
            'material_didactico' => ['required'],
            'herr_man' => [],
            'herr_semi' => [],
            'recom_seguridad' => [],
            'objetivo' => ['required'],
            'pasos' => ['required'],
            'fuentes_info' => ['required'],
            'file' => [],
        ];
    }

    public function messages()
    {
        return [
            'materia.required' => 'Falta seleccionar una materia',
            'unidad.required' => 'Falta seleccionar una unidad',
            'tema.required' => 'Falta seleccionar un tema',
            'nombre_practica.required' => 'Falta ingresar un nombre para la práctica',
            'atributo_egreso.required' => 'Falta seleccionar un atributo de egreso',
            'req_ub_op1.required' => 'Falta seleccionar una opción para la requerimiento de ubicación',
            'equipo_prot.required' => 'Falta seleccionar un equipo de protección',
            'maq_usar.required' => 'Falta seleccionar una maquinaria',
            'material_didactico.required' => 'Falta agregar material didactico',
            'objetivo.required' => 'Falta ingresar un objetivo',
            'pasos.required' => 'Falta ingresar los pasos a seguir',
            'fuentes_info.required' => 'Falta ingresar las fuentes de información',
        ];
    }
}
