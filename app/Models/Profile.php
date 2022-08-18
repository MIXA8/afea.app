<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable=['worker_id','citizenship','PNFL','INN','birthday','place_birthday','year_start','sex','family_status','passport'];

    public function profile_worker(){
        return $this->belongsTo(Worker::class,'profile_id','id');
    }
}
