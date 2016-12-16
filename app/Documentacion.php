<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{
    protected $fillable = ['id_estudiante', 'codigo', 'titulo', 'a', 'entregado', 'digitalizado'];

    protected $table = 'documentacion';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
