<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_reports extends Model
{
    public $fillable = ['topic','users_level','type','status','description'];
}
