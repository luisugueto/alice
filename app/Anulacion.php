<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anulacion extends Model
{
    protected $fillable = ['id_factura', 'descripcion'];

    protected $table = 'anulaciones';

    public function anulacion()
    {
        return $this->belongsTo('App\Facturacion', 'id_factura');
    }
}
