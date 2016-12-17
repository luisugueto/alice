<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosRealizados extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'pagos_realizados';
     
    protected $fillable = [
        'monto_pagado', 'monto_adeudado', 'fecha', 'no_cheque', 'no_transferencia'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    public $timestamps = false;
}
