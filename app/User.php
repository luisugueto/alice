<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id', 'foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function roles(){
        return $this->belongsTo('App\Roles', 'roles_id');
    }

    public function setFotoAttribute($foto){
        $this->attributes['foto'] = Carbon::now()->second.$foto->getClientOriginalName();
        $name = Carbon::now()->second.$foto->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($foto));
    }

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = $valor;
            //$this->attributes['password'] = \Hash::make($valor);
        }
    }

    public function personal(){

        return $this->hasOne('App\Personal', 'correo', 'email');
    }
}
