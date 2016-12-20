<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'bloques';

    protected $fillable = ['bloque', 'id_dia'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function asignacion_a()
    {
        return $this->belongsToMany('App\Asignaturas', 'asignacion_bloques', 'id_bloque', 'id_asig')->withPivot('id_seccion', 'id_aula', 'id_periodo');
    }

    public function asignacion_s()
    {
        return $this->belongsToMany('App\Seccion', 'asignacion_bloques', 'id_bloque', 'id_seccion')->withPivot('id_asig', 'id_aula', 'id_periodo');
    }

    public function asignacion_b()
    {
        return $this->belongsToMany('App\Aula', 'asignacion_bloques', 'id_bloque', 'id_aula')->withPivot('id_seccion', 'id_asig', 'id_periodo');
    }

    public function asignacion_p()
    {
        return $this->belongsToMany('App\Periodos', 'asignacion_bloques', 'id_bloque', 'id_periodo')->withPivot('id_seccion', 'id_aula', 'id_asig');
    }
}
