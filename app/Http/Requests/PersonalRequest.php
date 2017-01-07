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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo_pesonal' => 'required|digits_between:10,11|unique:datos_generales_personal,codigo_pesonal,'.  $this->route->getParameter('personal'),
            'nombres' => 'required',
            'apellido_paterno' => 'required',
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
            'correo' => 'required|email|unique:datos_generales_personal,correo,'.  $this->route->getParameter('personal'),
            'sueldo_mens' => 'required|numeric',
            'cuenta_bancaria' => 'required|numeric',
        ];
    }
}
