<?php

namespace App\Http\Controllers\Web\Workers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Workers\ChangeLoginPassword;
use App\Http\Requests\Web\Workers\WorkerAuthRequest;
use App\Http\Requests\Web\Workers\WorkerRegistrRequest;
use App\Models\Department;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            return redirect()->back()->with('not-login', 'Ошибка Авторизации');
        }
        return redirect()->route('worker.denary.index');
    }

    public function WorkerIndex()
    {
        view('layout.worker');
    }


    public function getSettings()
    {
        return view('worker.settings');
    }

    public function changeAvatarImgStore(Request $request)
    {
        $request->validate([
            'img' => 'required|max:3240',
        ]);
        if ($request->hasFile('img')) {
            Storage::delete(Auth::guard('worker')->user()->getImgValueBase());
            $folder = Auth::guard('worker')->user()->id;
            $img = $request->file('img')->store("workers/{$folder}");
            $result = DB::table('workers')->where('id', Auth::guard('worker')->user()->id)->update([
                'img' => $img
            ]);
        }
        return redirect()->back()->with('success', 'Фотография изменилась');
    }

    public function changeLoginAndPassword(ChangeLoginPassword $request)
    {
        if (!Hash::check($request->last_pass, Auth::guard('worker')->user()->password)) {
            return redirect()->back()->with('warning', 'Данные не изменились, неверный старый пароль');
        }
        if ($request->login != Auth::guard('worker')->user()->login) {
            $count = Worker::where('login', $request->login)->first();
            if ($count != null) {
                return redirect()->back()->with('warning', 'Данные не изменились, login уже занят');
            }
        }
        $worker = Worker::find(Auth::guard('worker')->user()->id);
        $worker->update(
            [
                'login' => $request->login,
                'password' => Hash::make($request->password),
            ]
        );
        return redirect()->back()->with('success', 'Данные изменились');
    }

    public function changeAccountProfile(Request $request)
    {
        $worker = Auth::guard('worker')->user();
        $worker->update(
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic,
                'description' => $request->description,
            ]
        );
        return redirect()->back()->with('success', 'Данные изменились');
    }


    public function logout()
    {
        Auth::guard('worker')->logout();
        return redirect()->route('worker.authorization.form');
    }

}
