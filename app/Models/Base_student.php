<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base_student extends Model
{
    use HasFactory;

    protected $fillable = ['passport', 'group', 'citizenship', 'PNFL', 'INN', 'birthday', 'place_birthday', 'year_start', 'sex', 'family_status'];
    protected $table = 'base_students';

//    public function title(){
//        return $this->belongsTo(Group::class);
//    }

    public function student()
    {
        $this->hasOne(Student::class, 'base_id');
    }
}
