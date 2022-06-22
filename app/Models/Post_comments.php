<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_comments extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'worker', 'comment', 'delete'];
    protected $table = 'post_comments';

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }

    public function workerG()
    {
        return $this->belongsTo(Worker::class, 'user_id');
    }

    public static function whoIsUser(Post_comments $comment, $isWorker)
    {
        if ($isWorker == 0) {
            return $user = [
                [
                    'comment' => $comment->comment
                ],
                [
                    'name' => $comment->student->base_inf->name . ' ' . $comment->student->base_inf->surname
                ],
                [
                    'img' => $comment->student->img
                ]
            ];
        } else {
            return $user = [
                [
                    'comment' => $comment->comment
                ],
                [
                    'name' => $comment->workerG->name . ' ' . $comment->workerG->patronymic
                ],
                [
                    'img' => $comment->workerG->img
                ]
            ];
        }
    }

    public static function whoIsUserFirstName($comment, $isWorker)
    {
        if ($isWorker == 0) {
            return  $comment->student->base_inf->name ;
        } else {
            return  $comment->workerG->name;
        }
    }

    public static function whoIsUserSecondName($comment, $isWorker)
    {
        if ($isWorker == 0) {
            return  $comment->student->base_inf->surname ;
        } else {
            return  $comment->workerG->patronymic;
        }
    }

    public static function whoIsUserImg( $comment, $isWorker)
    {
        if ($isWorker == 0) {
            return  $comment->student->img;
        } else {
            return  $comment->workerG->img;
        }
    }


}
