<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user()
    {
        return $this->hasMany('App\user');
    }

    public function account()
    {
        return $this->hasMany('App\Account');
    }
}
