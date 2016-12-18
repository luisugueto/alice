<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'prestamos';
     
    protected $fillable = [
        'monto', 'fecha'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

     public function personal(){
        return $this->belongsTo('App\Personal', 'id_personal');
    }

    public function prestamo(){
        return $this->hasOne('App\PagosRealizados', 'id');
    }

    public function remuneracion(){
        return $this->belongsTo('App\Remuneracion', 'id_personal');
    }
}
