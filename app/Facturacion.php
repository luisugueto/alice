<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $fillable = ['id_estudiante', 'numero', 'fecha', 'total_pago'];

    protected $table = 'facturacion';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }

    public function facturacion_rubros()
    {
    	return $this->hasMany('App\FacturasRubros', 'id_factura', 'id');
    }

    public function anulacion()
    {
        return $this->hasOne('App\Anulacion', 'id_factura', 'id');
    }
}
