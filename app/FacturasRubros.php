<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturasRubros extends Model
{
    protected $tabla="facturas_rubros";
    protected $fillable=['id_factura','id_rubro'];

    public function factura()
    {
    	return $this->belongsTo('App\Facturacion', 'id_factura');
    }

    public function rubro()
    {
    	return $this->belongsTo('App\Rubros', 'id_rubro');
    }

    public function realizados()
    {
    	return $this->hasMany('App\RubrosRealizados', 'id_factura_rubro');
    }
}
