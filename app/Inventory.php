<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function items()
    {
        return $this->belongsTo('App\items');
    }
}
