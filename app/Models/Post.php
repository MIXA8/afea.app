<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'shorts', 'slug', 'img', 'worker_id', 'department_id', 'status', 'comment', 'views','delete'];
    static $status = [
        [
            'id' => 0,
            'title' => 'Опубликованный'
        ],
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
