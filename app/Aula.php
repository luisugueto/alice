<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'aulas';

    protected $fillable = ['nombre'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function asignacion_a()
    {
        return $this->belongsToMany('App\Asignaturas', 'asignacion_bloques', 'id_aula', 'id_asig')->withPivot('id_seccion', 'id_periodo', 'id_periodo');
    }

    public function asignacion_s()
    {
        return $this->belongsToMany('App\Seccion', 'asignacion_bloques', 'id_aula', 'id_seccion')->withPivot('id_asig', 'id_aula', 'id_periodo');
    }

    public function asignacion_p()
    {
        return $this->belongsToMany('App\Periodos', 'asignacion_bloques', 'id_aula', 'id_periodo')->withPivot('id_seccion', 'id_aula', 'id_bloque');
    }

    public function asignacion_b()
    {
        return $this->belongsToMany('App\Bloque', 'asignacion_bloques', 'id_aula', 'id_bloque')->withPivot('id_seccion', 'id_aula', 'id_periodo');
    }
    
}
