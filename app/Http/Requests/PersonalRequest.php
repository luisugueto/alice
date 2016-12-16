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
            'codigo' => 'required|unique:datos_generales_personal',
            'nombres' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'cedula' => 'required|unique:datos_generales_personal',
            'nacimiento' => 'required',
            'ingreso' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'ecivil' => 'required',
            'eactual' => 'required',
            'tiporeg' => 'required',
            'especialidad' => 'required',
            'telefono' => 'required',
            'cargo' => 'required',
            'clave' => 'required',
        ];
    }
}
