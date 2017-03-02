<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescuentoFactura extends Model
{
    protected $fillable = ['id_factura', 'descuento'];

    protected $table = 'facturacion_has_descuento';

    public function factura()
    {
    	return $this->belongsTo('App\RubrosRealizados', 'id_factura');
    }
}
