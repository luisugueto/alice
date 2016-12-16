<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precedente extends Model
{
    protected $fillable = ['id_estudiante', 'curso', 'periodo', 'inst_precedente', 'term_primaria'];

    protected $table = 'datos_unidad_precedente';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
