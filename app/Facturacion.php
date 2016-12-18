<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $fillable = ['id_estudiante', 'nombre', 'fecha_max', 'monto', 'enviar_banco'];

    protected $table = 'facturacion';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
