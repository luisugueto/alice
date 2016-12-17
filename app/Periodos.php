<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'periodos';

    protected $fillable = [
        'nombre', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
