<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRecuperativos extends Model
{
    protected $table='tipo_recuperativos';
    protected $fillable=['id','tipo'];

    public function estudiantes(){

    	return $this->belongsToMany('App\Estudiante','calificacion_recuperativos','id_recuperativo','id_estudiante')->withPivot('id_periodo','calificacion')->withTimestamp();
    }

    public function periodos(){

    	return $this->belongsToMany('App\Periodos','calificacion_recuperativos','id_recuperativo','id_periodo')->withPivot('id_estudiante','calificacion')->withTimestamp();
    }
}
