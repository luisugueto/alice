<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion_parcial_subtotal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'calificacion_parcial_subtotal';

    protected $fillable = [
        'id_parcial', 'id_asignatura','avg_total','id_equivalencia'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function parciales(){

    	return $this->belongsTo('App\Parciales','id_parcial');
    }

    public function asignaturas(){

    	return $this->belongsTo('App\Asignaturas','id_asignatura');
    }

    public function equivalencias(){

    	return $this->belongsTo('App\Equivalencias','id_equivalencia');
    }
}
