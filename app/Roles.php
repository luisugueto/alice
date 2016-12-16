<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    public function usuario()
    {
        return $this->hasMany('App\User');
    }
}
