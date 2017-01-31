<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parciales extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'parciales';

    protected $fillable = [
        'id_estudiante' ,'id_quimestre','id_comportamiento','faltas_j','faltas_i','atrasos_j','atrasos_i','observaciones','avg_aprovechamiento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function estudiantes(){

    	return $this->belongsTo('App\Estudiante','id_estudiante');
    }

   /* public function personal(){

    	return $this->belongsTo('App\Personal','id_personal');
    }
*/
    public function quimestres(){

    	return $this->belongsTo('App\Quimestres','id_quimestre');
    }

    public function comportamiento(){

    	return $this->belongsTo('App\Comportamiento','id_comportamiento');
    }

    public function calificacion_parcial(){

        return $this->hasMany('App\Calificacion_parcial','id_parcial','id');
    }

    public function calificacion_parcial_subtotal(){

        return $this->hasMany('App\Callificacion_parcial_subtotal','id_parcial','id');
    }
}
