<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker_role extends Model
{
    use HasFactory;

    protected $table='worker_roles';

    public function worker(){
        return $this->belongsTo(Worker::class,'id','worker_id');
    }
}
