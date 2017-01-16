<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'secciones';

    protected $fillable = ['id_curso', 'literal', 'capacidad'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    
    public function curso()
    {
    	return $this->belongsTo('App\Cursos', 'id_curso');
    }

    public function asignacion_b()
    {
        return $this->belongsToMany('App\Bloque', 'asignacion_bloques', 'id_seccion', 'id_bloque')->withPivot('id_asig', 'id_aula', 'id_periodo');
    }

    public function asignacion_s()
    {
        return $this->belongsToMany('App\Asignatura', 'asignacion_bloques', 'id_seccion', 'id_asig')->withPivot('id_bloque', 'id_aula', 'id_periodo');
    }
    
    public function asignacion_au()
    {
        return $this->belongsToMany('App\Aula', 'asignacion_bloques', 'id_seccion', 'id_aula')->withPivot('id_seccion', 'id_bloque', 'id_periodo');
    }

    public function asignacion_p()
    {
        return $this->belongsToMany('App\Periodos', 'asignacion_bloques', 'id_seccion', 'id_periodo')->withPivot('id_seccion', 'id_aula', 'id_bloque');
    }
    public function asignaturas(){

        return $this->belongsToMany('App\Asignaturas','asignacion','id_seccion','id_asignatura')->withPivot('id_prof');
    }

    public function personal(){

        return $this->belongsToMany('App\Personal','asignacion','id_seccion','id_prof')->withPivot('id_asignatura');
    }

    public function personal_coordinacion(){

        return $this->belongsToMany('App\Personal','asignacion_coordinador','id_seccion','id_prof')->withPivot('id_periodo')->withTimestamps();

    }

}
