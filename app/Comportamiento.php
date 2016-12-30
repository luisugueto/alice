<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'comportamiento';

    protected $fillable = ['id','literal', 'descripcion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function Parciales(){

    	return $this->hasMany('App\Comportamiento','id_comportamiento','id');
    }

    public function quimestrales(){

        return $this->hasMany('App\Quimestrales','id_comportamiento','id');
    }
}
