<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPagosRealizados extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'forma_pagos_realizados';
     
    protected $fillable = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
