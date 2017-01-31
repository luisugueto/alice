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

    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'id_cargo');
    }

    public function informacionAcademica()
    {
        return $this->hasOne('App\InformacionAcademica', 'id');
    }

    public function remuneracion()
    {
        return $this->hasOne('App\Remuneracion', 'id');
    }

    public function asistencias(){

        return $this->hasMany('App\Asistencia', 'id_personal', 'id');
    }

    public function asignaturas(){

        return $this->belongsToMany('App\Asignaturas','asignacion','id_prof','id_asignatura')->withPivot('id_seccion','id_periodo')->withTimestamps();
    }
    
    public function secciones(){

        return $this->belongsToMany('App\Seccion','asignacion','id_prof','id_seccion')->withPivot('id_asignatura','id_periodo')->withTimestamps();
    }

    public function periodos(){

        return $this->belongsToMany('App\Periodos','asignacion','id_prof','id_periodo')->withPivot('id_asignatura','id_seccion')->withTimestamps();
    }

    public function secciones_coordinacion(){

        return $this->belongsToMany('App\Seccion','asignacion_coordinador','id_prof','id_seccion')->withPivot('id_periodo')->withTimestamps();
    }

    


}
