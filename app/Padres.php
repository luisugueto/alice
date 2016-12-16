<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padres extends Model
{
    protected $fillable = ['id_estudiante', 'nombres', 'cedula', 'foto', 'lugar_trabajo', 'direcion', 'telefono', 'correo', 'nacionalidad', 'nivel_educacion'];

    protected $table = 'datos_padres';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
