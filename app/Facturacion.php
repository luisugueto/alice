<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $fillable = ['id_estudiante', 'ruc', 'nombre', 'direccion', 'telefono', 'ultina_cobranza', 'enviar_banco'];

    protected $table = 'facturacion';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
