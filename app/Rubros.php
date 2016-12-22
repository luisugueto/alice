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
}
