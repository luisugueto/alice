<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class PersonalRequest extends Request
{
    function __construct(Route $route)
    {
        $this->route = $route;
    }
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
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */

    public function messages()
    {
        return [
            'id_cargo.required' => 'El campo cargo es requerido.',
            'codigo_pesonal.required' => 'El campo codigo personal es requerido.',
            'codigo_pesonal.digits_between' => 'El campo codigo personal debe tener entre 10 y 11 digitos.',
            'codigo_pesonal.unique' => 'codigo personal ya ha sido registrado.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'codigo_pesonal' => 'required|between:10,11|unique:datos_generales_personal,codigo_pesonal,'.  $this->route->getParameter('personal'),
            'nombres' => 'required|string',
            'apellido_paterno' => 'required|string',
            'cedula' => 'required|numeric|digits_between:10,11|unique:datos_generales_personal,cedula,'.  $this->route->getParameter('personal'),
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
            'descuento_iess'=>'numeric|min:0|max:100',
            'correo' => 'required|email|unique:datos_generales_personal,correo,'.  $this->route->getParameter('personal'),
            'sueldo_mens' => 'required|numeric',
            'cuenta_bancaria' => 'required|numeric',
        ];
    }
}
