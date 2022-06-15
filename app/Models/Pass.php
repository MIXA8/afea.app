<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;

    protected $table = 'passes';

    protected $fillable = ['worker_id', 'subject_id', 'student_id', 'pass', 'lesson_part', 'group_id', 'day', 'month', 'year', 'delete'];


}
