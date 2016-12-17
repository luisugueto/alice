<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias_parcial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'categorias_parcial';

    protected $fillable = [
        'categoria'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function calificacion_parcial(){

    	return $this->hasMany('App\Calificacion_parcial','id_categoria','id');
    }
}
