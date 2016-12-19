<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'asignaturas';

    protected $fillable = [
        'asignatura', 'codigo','id_curso'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function cursos(){

    	return $this->belongsTo('App\Cursos','id_curso');
    }

    public function calificacion_parcial(){

        return $this->hasMany('App\Calificacion_parcial','id_asignatura','id');
    }

    public function calificacion_parcial_subtotal(){

        return $this->hasMany('App\Calificacion_parcial_subtotal','id_asignatura','id');
    }

    public function calificacion_quimestre(){

        return $this->hasMany('App\Calificacion_quimestre','id_asignatura','id');
    }
}
