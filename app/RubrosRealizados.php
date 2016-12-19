<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RubrosRealizados extends Model
{
    protected $fillable = ['monto_pagado', 'monto_adeudado', 'fecha', 'id_factura', 'id_modalidad', 'id_estudiante', 'no_transferencia', 'no_cheque'];

    protected $table = 'rubros_realizados';	

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'is_estudiante');
    }

    public function facturacion()
    {
    	return $this->belongsTo('App\Facturacion', 'id_factura');
    }

    public function modalidad()
    {
    	return $this->belongsTo('App\Modalidad', 'id_modalidad');
    }
}
