<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equivalencias extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'equivalencias';

    protected $fillable = [
        'minimo', 'maximo','literales','descripcion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function calificacion_parcial_subtotal(){

    	return $this->hasMany('App\Calificacion_parcial_subtotal','id_equivalencia','id');
    }

    public function calificacion_quimestre(){

        return $this->hasMany('App\Calificacion_quimestre','id_equivalencia','id');
    }
}
