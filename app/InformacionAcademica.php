<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacionAcademica extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'informacion_academica';
     
    protected $fillable = [
        'id_personal', 'primaria', 'secundaria','superior', 'titulo', 'cursos', 'historial_laboral'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
     public $timestamps = false;
}
