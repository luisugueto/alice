<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'cursos';

    protected $fillable = ['curso'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function asignaturas(){

    	return $this->hasMany('App\Asignaturas','id_curso','id');
    }

    public function seccion()
    {
        return $this->hasMany('App\Seccion', 'id_curso', 'id');
    }

    public function rubros()
    {
        return $this->hasMany('App\Rubros', 'id_curos', 'id');
    }
}
