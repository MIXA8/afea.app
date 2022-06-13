<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'description', 'worker_id', 'colour'];

    public function timeTable(){
        return $this->hasMany(Timetable::class);
    }

    public function worker(){
        return $this->belongsTo(Worker::class,'worker_id');
    }


}
