<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonalRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'codigo_pesonal' => 'required|unique:datos_generales_personal',
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'cedula' => 'required|numeric|unique:datos_generales_personal|digits_between:10,11',
            'fecha_nacimiento' => 'required',
            'fecha_ingreso' => 'required',
            'edad' => 'required|numeric|max:99|min:18',
            'genero' => 'required',
            'edo_civil' => 'required',
            'estado_actual' => 'required',
            'tipo_registro' => 'required',
            'especialidad' => 'required',
            'primaria' => 'required',
            'telefono' => 'required|numeric|digits_between:10,11',
            'id_cargo' => 'required',
            'correo' => 'required|email|unique:datos_generales_personal',
            'sueldo_mens' => 'required|numeric',
            'cuenta_bancaria' => 'required|numeric|unique:remuneracion'
        ];
    }
}
