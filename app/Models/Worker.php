<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Worker extends Authenticatable
{
    use HasFactory;
//    protected $guarded = 'worker';
    protected $fillable = [
        'name', 'surname', 'patronymic', 'department', 'login', 'password',
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
        DB::table('workers')
            ->where('id', $id)
            ->update(['token' => $token]);
        return $token;
    }

}
