<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'base_id', 'login', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token', 'profile_id',
    ];

    public static function createToken($id)
    {
        $token = Str::random(60);
        DB::table('students')
            ->where('id', $id)
            ->update(['token' => $token]);
        return $token;
    }
}
