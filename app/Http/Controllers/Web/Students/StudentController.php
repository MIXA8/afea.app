<?php

namespace App\Http\Controllers\Web\Students;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseStudentResource;
use App\Models\Base_student;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /*
     * Авторизации
     */
//    public function getForm()
//    {
//        return view('student.create');
//    }


//    public function Studentauthorize(StudentAuthRequest $request)
//    {
//        $validated = $request->validated();
//        $student = DB::table('base_students')->select('id', 'register')->where('passport', $request->get('passport'))->first();
//        if (!$student) {
//            return response()->json(
//                [
//                    'message' => "Пользователь не найден",
//                ]
//            );
//        }
//        if ($student->register == 1) {
//            return response()->json(
//                [
//                    'message' => "Пользователь уже зарегистрирован",
//                ]
//            );
//        }
//        DB::table('base_students')->where('id', $student->id)->update(['register' => '1']);
//        Student::create(
//            [
//                'base_id' => $student->id,
//                'login' => $request->get('login'),
//                'password' => Hash::make($request->get('password')),
//            ]
//        );
//        return response()->json(
//            [
//                'message' => "Поздравляем, вы зарегистрировались",
//            ]
//        );
//    }
//
//    public function StudentLoginForm()
//    {
//        return view('student.login');
//    }
//
//    public function StudentLogin(Request $request)
//    {
//        if (!Auth::guard('student')->attempt(
//            [
//                'login' => $request->login,
//                'password' => $request->password,
//            ])) {
//            return response()->json([
//                'message' => 'Неверно указан логин или пароль',
//                'errors' => 'Unauthorised'
//            ]);
//        }
//        return response()->json([
//            'message' => 'Вы успешео взашли на свой аккаунт',
//            'token_api' => Student::createToken(Auth::guard('student')->user()->id),
//        ], 200);
//    }



    public function changeAvatarImgStore(Request $request,Student $student)
    {
//        $request->validate([
//            'img' => 'required|max:3240',
//        ]);
        $id=$student->getTokenId($request->header('token'));
//        if ($request->hasFile('img')) {
//            Storage::delete(Auth::guard('student')->user()->img);
//            $folder = Auth::guard('student')->user()->id;
//            $img = $request->file('img')->store("students/".Auth::guard('student')->user()->id."/{$folder}");
//            $result = DB::table('students')->where('id', Auth::guard('student')->user()->id)->update([
//                'img' => $img
//            ]);
//        }
        return response()->json($id);
    }

}
