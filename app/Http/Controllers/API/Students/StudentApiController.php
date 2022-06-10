<?php

namespace App\Http\Controllers\API\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\students\StudentAPIAuthRequest;
use App\Http\Requests\Students\StudentAuthRequest;
use App\Http\Resources\BaseStudentResource;
use App\Http\Resources\GroupeResource;
use App\Models\Base_student;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentApiController extends Controller
{
    public function Studentauthorize(StudentAPIAuthRequest $request)
    {
        $validated = $request->validated();
        $student = DB::table('base_students')->select('id', 'register')->where('passport', $request->get('passport'))->first();
        if (!$student) {
            return response()->json(
                [
                    'message' => "Пользователь не найден",
                ]
            );
        }
        if ($student->register == 1) {
            return response()->json(
                [
                    'message' => "Пользователь уже зарегистрирован",
                ]
            );
        }
        DB::table('base_students')->where('id', $student->id)->update(['register' => '1']);
        Student::create(
            [
                'base_id' => $student->id,
                'login' => $request->get('login'),
                'password' => Hash::make($request->get('password')),
            ]
        );
        return response()->json(
            [
                'message' => "Поздравляем, вы зарегистрировались",
            ]
        );
    }


    public function StudentLogin(Request $request)
    {
        if (!Auth::guard('student')->attempt(
            [
                'login' => $request->login,
                'password' => $request->password,
            ])) {
            return response()->json([
                'message' => 'Неверно указан логин или пароль',
                'errors' => 'Unauthorised'
            ]);
        }
        return response()->json([
            'message' => 'Вы успешео взашли на свой аккаунт',
            'token_api' => Student::createToken(Auth::guard('student')->user()->id),
        ], 200);
    }

    public function personalInf(Request $request){
        $id=Student::find($request->id)->limit(1)->get('base_id')->first();
//        $information=BaseStudentResource::collection(Base_student::where('id',$id->base_id)->get(['name','surname','patronymic','passport'])->first());
        $information = new BaseStudentResource(Base_student::where('id',$id->base_id)->first());
//        dd($information->group()->id);
        return response()->json($information);
    }
}
