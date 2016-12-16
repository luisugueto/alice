<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $fillable = ['id_estudiante', 'parte_num', 'fecha', 'nivel', 'tipo', 'aplicado_por', 'estado', 'detalles', 'periodo'];

    protected $table = 'novedades';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
