<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wrating extends Model
{
    use HasFactory;
    protected $table='wratings';
    protected $fillable=['student_id','worker_id','rating'];

    public function addRating($request){
        $unique=Wrating::where(
            [
                ['worker_id','=',$request->worker],
                ['student_id','=',$request->student->id]
            ]
        )->first();
        if($unique==null){
            Wrating::create(
                [
                    'student_id'=>$request->student->id,
                    'worker_id'=>$request->worker,
                    'rating'=>$request->rating,
                ]
            );
        }
        else{
            $unique->rating=$request->rating;
            $unique->save();
        }
        $ratingSumm = Wrating::where(
            [
                ['worker_id','=',$request->worker],
            ]
        )->sum('rating');
        $ratingCount = Wrating::where(
            [
                ['worker_id','=',$request->worker],
            ]
        )->count();
        $worker=Worker::find($request->worker);
        $worker->rating=($ratingSumm/$ratingCount);
        $worker->save();
    }

}
