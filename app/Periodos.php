<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'periodos';

    protected $fillable = [
        'nombre', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function quimestres(){

        return $this->hasMany('App\Quimestres','id_periodo','id');
    }

    public function asignacion_a()
    {
        return $this->belongsToMany('App\Asignaturas', 'asignacion_bloques', 'id_periodo', 'id_asig')->withPivot('id_seccion', 'id_bloque', 'id_periodo');
    }

    public function asignacion_s()
    {
        return $this->belongsToMany('App\Seccion', 'asignacion_bloques', 'id_periodo', 'id_seccion')->withPivot('id_asig', 'id_periodo', 'id_seccion');
    }

    public function asignacion_au()
    {
        return $this->belongsToMany('App\Aula', 'asignacion_bloques', 'id_periodo', 'id_aula')->withPivot('id_seccion', 'id_asig', 'id_bloque');
    }

    public function asignacion_b()
    {
        return $this->belongsToMany('App\Bloque', 'asignacion_bloques', 'id_periodo', 'id_bloque')->withPivot('id_seccion', 'id_aula', 'id_asig');
    }

    public function rubros()
    {
        return $this->hasMany('App\Rubros', 'id_periodo', 'id');
    }

    public function estudiantes(){

        return $this->belongsToMany('App\Estudiante','calificacion_recuperativos','id_periodo','id_estudiante')->withPivot('id_recuperativo','calificacion')->withTimestamp();
    }

    public function recuperativos()
    {

        return $this->belongsToMany('App\TipoRecuperativos','calificacion_recuperativos','id_periodo','id_recuperativo')->withPivot('id_estudiante','calificacion')->withTimestamp();
    }
}
