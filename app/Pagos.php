<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'pagos';
     
    protected $fillable = [
        'monto_pagado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
