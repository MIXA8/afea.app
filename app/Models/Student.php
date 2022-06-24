<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Student extends Authenticatable
{
    use HasFactory;

    protected $guarded = 'student';

    protected $fillable = [
        'base_id', 'login', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
    ];

    public static function createToken($id)
    {
        $token = Str::random(60);
        DB::table('students')
            ->where('id', $id)
            ->update(['token' => $token]);
        return $token;
    }

    public function getTokenId($token)
    {
        return Student::where('token',$token)->select('id','img')->first();
    }

    public function getTokenStudent($token)
    {
        return Student::where('token',$token)->get(['id','profile_id','base_id','login','token','img'])->first();
    }

    public function base_inf()
    {
        return $this->belongsTo(Base_student::class,'base_id');
    }

    public function comment()
    {
        return $this->hasMany(Post_comments::class,'id');
    }

}
