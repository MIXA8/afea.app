<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Worker extends Authenticatable
{
    use HasFactory;

//    protected $guarded = 'worker';
    protected $fillable = [
        'name', 'surname', 'patronymic', 'department', 'login', 'password', 'isteacher','number','description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token', 'profile_id',
    ];

    public function timeTable()
    {
        return $this->hasMany(Timetable::class,'worker_id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, 'id');
    }


    public function access()
    {
        return $this->hasMany(Worker_role::class, 'worker_id','id');
    }

    public function department_worker()
    {
        return $this->belongsTo(Department::class, 'department', 'id');
    }

    public function worker_profile(){
        return $this->hasOne(Department::class, 'id', 'profile_id');
    }

    public function comment()
    {
        return $this->hasMany(Post_comments::class,'id');
    }

//    public function worker_access($middleware_access)
//    {
//        $accesses = Worker_role::where('worker_id', Auth::guard('worker')->user()->id)->get(['access']);
//        foreach ($accesses as $access) {
//            if ($access->access == $middleware_access) {
//                return true;
//            }
//        }
//        return false;
//    }

    public function worker_access_api($middleware_access){
        foreach ($this->access as $access) {
            if ($access->access == $middleware_access) {
                return true;
            }
        }
        return false;
    }

    public static function createToken($id)
    {
        $token = Str::random(60);
        DB::table('workers')
            ->where('id', $id)
            ->update(['token' => $token]);
        return $token;
    }

    public static function getToken($token)
    {
        $id = Worker::where('token', $token)->select('id')->value('id');
        if ($id == null) {
            abort(404);
        }
        return $id;
    }

    public static function getTokenWorker($token)
    {
        $id = Worker::where('token', $token)->first();
        if ($id == null) {
            abort(404);
        }
        return $id;
    }

    public function getTokenId($token)
    {
        return Worker::where('token', $token)->select('id', 'img')->first();
    }

    public function getImgValueBase(){
        $img=Str::after($this->img,env('APP_URL'));
        if($img =="/storage/standart/user.png"){
            return '';
        }else{
            $img=Str::after($img,"storage/");
            return $img;
        }

    }


    public function getimgAttribute($value){
        if($value==null || $value==" "){
            return asset('storage/standart/user.png');
        }
        return asset('storage/'.$value);
    }


    public function getAccessValue($value){
        foreach ($this->access as $acc){
            if($acc->access==$value){
                return true;
            }
        }
        return false;
    }

}
