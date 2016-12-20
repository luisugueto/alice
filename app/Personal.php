<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'datos_generales_personal';
     
    protected $fillable = [
        'codigo_pesonal', 'apellido_paterno', 'apellido_materno','nombres', 'cedula', 'fecha_nacimiento', 'fecha_ingreso', 'edad', 'edo_civil', 'genero', 'estado_actual', 'tipo_registro', 'especialidad', 'direccion', 'telefono', 'correo', 'clave', 'ingreso_notas', 'id_cargo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];


    public function tipo()
    {
        return $this->belongsToMany('App\Tipo', 'id_tipo');
    }

    public function informacionAcademica()
    {
        return $this->hasOne('App\InformacionAcademica', 'id');
    }

    public function remuneracion()
    {
        return $this->hasOne('App\Remuneracion', 'id');
    }
    
}
