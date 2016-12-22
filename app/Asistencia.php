<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'asistencia_personal';
    protected $fillable = ['id_personal', 'id_fecha','entrada','salida'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function personal()
    {
        return $this->belongsTo('App\Personal', 'id_personal');
    }
}
