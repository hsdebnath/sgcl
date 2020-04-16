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

    public function items()
    {
        return $this->hasMany('App\items');
    }

    public function order()
    {
        return $this->hasMany('App\order');
    }

    public function bank()
    {
        return $this->hasMany('App\bank');
    }
}
