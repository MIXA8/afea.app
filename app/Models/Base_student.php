<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base_student extends Model
{
    use HasFactory;

    protected $fillable=['passport','group'];
    protected $table='base_students';

    public function group($id)
    {
        return $this->hasMany(Group::class,'id');
    }
}
