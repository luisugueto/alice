<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrestamoRequest extends Request
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
            'personal' => 'required',
            'monto' => 'required',
            'motivo' => 'required',
            'tipo' => 'required'
            
        ];
    }
}
