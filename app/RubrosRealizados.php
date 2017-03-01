<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RubrosRealizados extends Model
{
    protected $fillable = ['id_factura_rubro', 'monto_pagado', 'monto_adeudado', 'fecha', 'id_modalidad', 'id_estudiante', 'no_transferencia', 'no_cheque'];

    protected $table = 'rubros_realizados';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }

    public function modalidad()
    {
    	return $this->belongsTo('App\Modalidad', 'id_modalidad');
    }

    public function formas()
    {
        return $this->belongsToMany('App\FormasPago', 'forma_rubros_realizados', 'id_rubro_realizado', 'id_forma');
    }

    public function rubros_factura()
    {
        return $this->belongsTo('App\FacturasRubros', 'id_factura_rubro', 'id');
    }

    public function descuento()
    {
        return $this->hasOne('App\DescuentoFactura', 'id_factura', 'id');
    }
}
