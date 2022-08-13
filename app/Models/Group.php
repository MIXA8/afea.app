<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable=['title','course','study','delete'];

    public function studentsGroup()
    {
        return $this->hasMany(Base_student::class,'group','id');
    }

    public function timeTable(){
        return $this->hasMany(Timetable::class,'id');
    }

    public function studentsPasses(){
        return $this->hasMany(Pass::class,'group_id','id');
    }
}
