<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'tipo_empleado';

    protected $fillable = [
        'tipo_empleado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function cantidaddescuento()
    {
        return $this->hasMany('App\CantidadDescuento', 'id_tipoempleado', 'id');
    }

    public function cargo(){

        return $this->hasMany('App\Cargo', 'id_tipo_empleado', 'id');
    }
}
