<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quimestrales extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'quimestrales';

    protected $fillable = [
        'id_estudiante', 'id_quimestre','total_faltas_j','total_faltas_i','total_atrasos_j','total_atrasos_i','sumatoria','avg_aprovechamiento_q','id_comportamiento','recomendaciones'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function estudiante(){

    	return $this->belongsTo('App\Estudiante','id_estudiante');
    }

    public function quimestres(){

    	return $this->belongsTo('App\Quimestres','id_quimestre');
    }

    public function comportamiento(){

    	return $this->belongsTo('App\Comportamiento','id_comportamiento');
    }

    public function calificacion_quimestre(){

        return $this->hasMany('App\Calificacion_quimestre','id_quimestrales');
    }
}
