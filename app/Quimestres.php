<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quimestres extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'quimestres';

    protected $fillable = [
        'inicio', 'fin','numero','id_periodo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];


    public function periodos(){

    	return $this->belongsTo('App\Periodos','id_periodo');
    }

    public function parciales(){

    	return $this->hasMany('App\Parciales','id_quimestre','id');
    }

    public function quimestrales(){

        return $this->hasMany('App\Quimestrales','id_quimestre','id');
    }
}
