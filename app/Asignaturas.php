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

    public function asignacion_b()
    {
        return $this->belongsToMany('App\Bloque', 'asignacion_bloques', 'id_asig', 'id_bloque')->withPivot('id_seccion', 'id_aula', 'id_periodo');
    }

    public function asignacion_s()
    {
        return $this->belongsToMany('App\Seccion', 'asignacion_bloques', 'id_asig', 'id_seccion')->withPivot('id_bloque', 'id_aula', 'id_periodo');
    }

    public function asignacion_a()
    {
        return $this->belongsToMany('App\Aula', 'asignacion_bloques', 'id_asig', 'id_aula')->withPivot('id_seccion', 'id_bloque', 'id_periodo');
    }

    public function asignacion_p()
    {
        return $this->belongsToMany('App\Periodos', 'asignacion_bloques', 'id_asig', 'id_periodo')->withPivot('id_seccion', 'id_aula', 'id_bloque');
    }
}
