<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsTo('App\Roles', 'roles_id');
    }

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = $valor;
            //$this->attributes['password'] = \Hash::make($valor);
        }
    }
}
