<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    //此訂單擁有那些商品
    public function items()
    {
        return $this->belongsToMany(\App\Models\commodities::class)->withTimestamps()->withPivot('qty');
    }

    //總計屬性
    public function getSumAttribute()
    {
        $orderItems = $this->items;
        $sum = 0;
        foreach ($orderItems as $item) {
            $sum += ($item->price * $item->pivot->qty);
        }
        return $sum;
    }
}
