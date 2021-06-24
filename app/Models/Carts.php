<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function cartitems()
    {
        return $this->hasMany('App\Models\carts_items');
    }

}