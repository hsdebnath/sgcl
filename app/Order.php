<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->belongsTo('App\items');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'companies_id');
    }

    public function sales()
    {
        return $this->hasMany('App\Sales');
    }
}
