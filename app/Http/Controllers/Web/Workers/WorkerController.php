<?php

namespace App\Http\Controllers\Web\Workers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Workers\WorkerAuthRequest;
use App\Http\Requests\Web\Workers\WorkerRegistrRequest;
use App\Models\Department;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    public function getForm()
    {
        $departments = Department::select(['title', 'id'])->get();
        return view('worker.register', compact('departments'));
    }


    public function Workerauthorize(WorkerAuthRequest $request)
    {
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

    public function WorkerLogin(WorkerRegistrRequest $request)
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
        return view('layout.worker');
    }

    public function WorkerIndex()
    {
        view('worker.index');
    }
}
