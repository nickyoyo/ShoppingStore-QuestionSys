<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_order extends Model
{
    public $fillable = ['id','order_id','item_id','qty','desc'];
}
