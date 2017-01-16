<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_Coordinacion extends Model
{
    protected $table="asignacion_coordinacion";
    protected $fillable=['id_prof','id_seccion','id_periodo'];


    public function personal(){

    	
    }
}
