<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anticipo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'anticipos';
     
    protected $fillable = [
        'monto', 'fecha'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
