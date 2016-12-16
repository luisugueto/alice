<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remuneracion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'remuneracion';
     
    protected $fillable = [
        'sueldo_1era_quincena', 'sueldo_2da_quincena', 'sueldo_mens', 'iess_patronal', 'iess_personal', 'descuento_iess','bono_responsabilidad', 'horas_extras', 'cuenta_bancaria','devolver_fondos'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
     public $timestamps = false;
    
}
