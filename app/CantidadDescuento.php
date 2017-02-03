<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadDescuento extends Model
{
    
    protected $table='cantidad_descuento';
    protected $filliable=['id', 'id_tipoempleado', 'cantidad'];

    public function tipoempleado()
    {
    	return $this->belongsTo('App\Tipo', 'id_tipoempleado');
    }
}
