<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    public function items()
    {
        return $this->belongsTo('App\items');
    }
}
