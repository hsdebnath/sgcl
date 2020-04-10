<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->belongsTo('App\items');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function sales()
    {
        return $this->hasMany('App\Sales');
    }
}
