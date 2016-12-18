<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormasPago extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'formas_pagos';
     
    protected $fillable = [
        'forma'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
