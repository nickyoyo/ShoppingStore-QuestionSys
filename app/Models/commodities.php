<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commodities extends Model
{
   // protected $guarded = [];
   protected $fillable = ['type','name','filename','price','image_path','account','productnum','description'];
}
