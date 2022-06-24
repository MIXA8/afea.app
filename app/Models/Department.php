<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category', 'senior', 'writter', 'img'];
    protected $table = 'departments';

    public function worker()
    {
        return $this->hasMany(Worker::class, 'department', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'id');
    }
}
