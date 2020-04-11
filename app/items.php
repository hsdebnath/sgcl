<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company','vendor_id');
    }

    public function purchase()
    {
        return $this->hasMany('App\purchase');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function inventory()
    {
        return $this->hasOne('App\inventory');
    }
}
