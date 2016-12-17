<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IESS extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'i_e_s_s';

    protected $fillable = [
        'nombre', 'valor'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
