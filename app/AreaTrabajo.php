<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaTrabajo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'area_trabajos';

    protected $fillable = ['nombre'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function cargos(){

        return $this->hasMany('App\Cargo', 'id_area', 'id');
    }
}
