<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion_quimestre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'calificacion_quimestre';

    protected $fillable = [
        'id_quimestrales', 'id_asignatura','avg_gp','avg_gp80','examen_q','examen_q20','avg_q_cuantitativa','id_equivalencia'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function quimestrales(){

    	return $this->belongsTo('App\Quimestrales','id_quimestrales');
    }

    public function asignaturas(){

    	return $this->belongsTo('App\Asignaturas','id_asignatura');
    }

    public function equivalencias(){

    	return $this->belongsTo('App\Equivalencias','id_equivalencia');
    }
}
