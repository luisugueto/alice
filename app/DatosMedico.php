<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosMedico extends Model
{
    protected $fillable = ['id_estudiante', 'grupo_sanguineo', 'peso', 'altura', 'capacidad_especial', 'procentaje_discapacidad', 'medicinas_contraindicadas', 'alergico_a', 'patologia'];

    protected $table = 'datos_medicos';

    public function estudiante()
    {
    	return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
