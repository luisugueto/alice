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
    protected $fillable = ['id', 'id_area', 'id_tipo_empleado', 'nombre'];

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

    public function personal()
    {
        return $this->hasMany('App\Personal', 'id_cargo', 'id');
    }

    public function tipo_empleado(){

        return $this->belongsTo('App\Tipo', 'id_tipo_empleado');
    }
}
