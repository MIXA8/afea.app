<?php

namespace App\Http\Controllers\API\Workers;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerApiController extends Controller
{
//    public function workerauthorize(StudentAPIAuthRequest $request)
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


    public function WorkerLogin(Request $request)
    {
        if (!Auth::guard('worker')->attempt(
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
            'token_api' => Worker::createToken(Auth::guard('worker')->user()->id),
        ], 200);
    }

}
