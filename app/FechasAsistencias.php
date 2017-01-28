<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechasAsistencias extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'fechas_asistencias';

    protected $fillable = ['fecha'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function asistencia()
    {
        return $this->hasMany('App\Asistencia', 'id_fecha', 'id');
    }
}
