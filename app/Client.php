<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function animals () 
    {
        return $this->hasMany('App\Animal');
    }
}
