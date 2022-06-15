<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    use HasFactory;

    protected $fillable=['title','date','long_days'];
    protected $dates = ['created_at', 'updated_at', 'date'];
}
