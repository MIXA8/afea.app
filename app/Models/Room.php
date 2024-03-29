<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'amount','delete'
    ];

    public function timeTable(){
        return $this->hasMany(Timetable::class,'id');
    }

}
