<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuentos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'descuentos';
    protected $fillable = [
        'descuento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function empleado()
    {
        return $this->belongsTo('App\Tipo', 'id_tipo_empleado');
    }
}
