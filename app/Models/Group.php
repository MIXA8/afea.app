<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function title()
    {
        return $this->hasMany(Base_student::class);
    }

    public function timeTable(){
        return $this->hasMany(Timetable::class,'id');
    }
}
