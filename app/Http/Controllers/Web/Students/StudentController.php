<?php

namespace App\Http\Controllers\Web\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\Students\StudentAuthRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /*
     * Авторизации
     */
    public function getForm()
    {
        return view('student.create');
    }


    public function login(StudentAuthRequest $request)
    {
        $validated = $request->validated();
        $student=DB::table('base_students')->select('id','register')->where('passport',$request->get('passport'))->first();
        if(!$student){
            return response()->json(
                [
                    'message' => "Пользователь не найден",
                ]
            );
        }
        if($student->register==1){
            return response()->json(
                [
                    'message' => "Пользователь уже зарегистрирован",
                ]
            );
        }
        DB::table('base_students')->where('id',$student->id)->update(['register'=>'1']);
        return response()->json(
            [
                'message' => "Поздравляем, вы зарегистрировались",
            ]
        );
    }
}
