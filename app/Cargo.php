<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'cargos';
    protected $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function area()
    {
        return $this->belongsTo('App\AreaTrabajo', 'id_area');
    }
    public function empleado()
    {
        return $this->belongsTo('App\Tipo', 'id_tipo_empleado');
    }
}
