<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescontarMensualidad extends Model
{
    protected $table='descontar_mensualidads';
    protected $filliable=['id', 'nombre', 'cantidad'];
}
