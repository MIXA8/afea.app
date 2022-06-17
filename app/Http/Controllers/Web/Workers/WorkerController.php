<?php

namespace App\Http\Controllers\Web\Workers;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Workers\WokerRequestRegistr;
use App\Models\Student;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    public function getForm()
    {
        return view('worker.create');
    }


    public function Workerauthorize(WokerRequestRegistr $request)
    {
        $validated = $request->validated();
        $student = DB::table('workers')->select('id')->where(
            [
                ['login', '=', $request->get('login')],
            ])->first();
        if ($student) {
            return response()->json(
                [
                    'message' => "Логин уже занят",
                ]
            );
        }
        Worker::create(
            [
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'patronymic' => $request->get('patronymic'),
                'department' => $request->get('department'),
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

    public function WorkerLoginForm()
    {
        return view('worker.login');
    }

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
            'token_api' => Student::createToken(Auth::guard('worker')->user()->id),
        ], 200);
    }
}
