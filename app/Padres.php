<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padres extends Model
{
    protected $fillable = ['id_estudiante', 'nombres_pa', 'cedula_pa', 'foto_pa', 'lugar_trabajo', 'direccion_pa', 'telefono_pa', 'correo_pa', 'nacionalidad_pa', 'nivel_educacion'];

    protected $table = 'datos_padres';

    public function estudiante()
    {
    	return $this->belongsToMany('App\Estudiante', 'padres_has_estudiantes', 'id_padre', 'id_estudiante');
    }
}
