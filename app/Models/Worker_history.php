<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker_history extends Model
{
    use HasFactory;

    protected $table = 'wor_history';
    protected $fillable = ['worker_id', 'history'];
}
