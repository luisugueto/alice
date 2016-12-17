<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion_parcial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'calificacion_parcial';

    protected $fillable = [
        'id_parcial', 'id_asignatura','id_categoria','calificacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function parciales(){

    	return $this->belongsTo('App\Parciales','id_parcial');
    }

    public function asignaturas(){

    	return $this->belongsTo('App\Asignaturas','id_asignatura');
    }

    public function categorias_parcial(){

    	return $this->belongsTo('App\Categorias_parcial','id_categoria');
    }
}
