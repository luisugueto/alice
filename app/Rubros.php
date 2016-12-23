<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubros extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'rubros';
     
    protected $fillable = ['nombre', 'monto', 'fecha', 'id_curso', 'id_periodo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    
    public function curso()
    {
    	return $this->belongsTo('App\Cursos', 'id_curso');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos', 'id_periodo');
    }

    public function estudiante()
    {
         return $this->belongsToMany('App\Estudiante', 'facturacion', 'id_rubro', 'id_estudiante')->withTimestamps();
    }

    public function facturacion_rubros()
    {
         return $this->hasMany('App\FacturasRubros', 'id_rubro', 'id');
    }
    
    public function rubros_realizados()
    {
        return $this->hasMany('App\RubrosRealizados', 'id_rubro', 'id');
    }
}
