<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = ['id_representante', 'codigo_matricula', 'apellido_paterno', 'apellido_materno', 'nombres', 'cedula', 'fecha_nacimiento', 'fecha_registro', 'genero', 'estado_actual', 'fecha_registro', 'genero', 'estado_actual', 'tipo_registro', 'direccion', 'nacionalidad', 'provincia', 'ciudad_natal', 'telefono', 'correo'];

    protected $table = 'datos_generales_estudiante';

    public function getApellidosAttribute()
    {
        return $this->apellido_paterno.' '.$this->apellido_materno;
    }

    public function medicos()
    {
    	return $this->hasOne('App\DatosMedico', 'id_estudiante', 'id');
    }

    public function documentos()
    {
    	return $this->hasMany('App\Documentacion', 'id_estudiante', 'id');
    }

    public function facturaciones()
    {
    	return $this->hasMany('App\Facturacion', 'id_estudiante', 'id');
    }

    public function novedades()
    {
    	return $this->hasMany('App\Novedad', 'id_estudiante', 'id');
    }

    public function padres()
    {
    	return $this->belongsToMany('App\Padres', 'padres_has_estudiantes', 'id_estudiante', 'id_padre');
    }

    public function precedencia()
    {
    	return $this->hasOne('App\Precedente', 'id_estudiante', 'id');
    }

    public function representante()
    {
    	return $this->belongsTo('App\Representante', 'id_representante');
    }

    public function parciales(){

        return $this->hasMany('App\Parciales','id_estudiante','id');
    }

    public function quimestrales(){

        return $this->hasMany('App\Quimestrales','id_estudiante','id');
    }

    // public function rubros()
    // {
    //     return $this->belongsToMany('App\Facturacion', 'rubros', 'id_estudiante', 'id_factura');
    // }
    public function cursos(){

        return $this->belongsToMany('App\Cursos','inscripciones','id_estudiante','id_curso')->withPivot('id_seccion','id_periodo')->withTimestamps();
    }
}
