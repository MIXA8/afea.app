<?php

namespace App\Http\Controllers\API\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\students\StudentAPIAuthRequest;
use App\Http\Requests\API\students\StudentChangeLP;
use App\Http\Resources\BaseStudentResource;
use App\Models\Base_student;
use App\Models\Holidays;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function personalInf(Request $request)
    {
        $id = Student::find($request->id)->limit(1)->get('base_id')->first();
        $information = new BaseStudentResource(Base_student::where('id', $id->base_id)->first());
        return response()->json($information);
    }

    public function updatePersonalInf(Request $request)
    {
        $information = Base_student::find($request->id);
        $information->update($request->all());
        return response()->json($information);
    }

    public function changeAvatarImgStore(Request $request, Student $student)
    {
        $request->validate([
            'img' => 'required|max:3240',
        ]);
        $student = $student->getTokenId($request->header('token'));
        if ($request->hasFile('img')) {
            Storage::delete($student->img);
            $folder = $student->id;
            $img = $request->file('img')->store("students/{$folder}");
            $result = DB::table('students')->where('id', $student->id)->update([
                'img' => $img
            ]);
        }
        $student = $student->getTokenId($request->header('token'));
        $src = asset("storage/{$student['img']}");
        return response()->json(
            [
                'img' => $src,
            ]
        );
    }

    public function holidays(Request $request)
    {
        $now = date('Y-m-d');
        $holiday = Holidays::where('date', '<=', $now)
            ->orWhere(
                [
                    [
                        'long_days', '>=', $now,
                    ],
                    [
                        'date', '<=', $now,
                    ]
                ]
            )
            ->select('id', 'title')->first();
        $birthday = Base_student::where(
            [
                [
                    'passport', '=', $request->passport
                ]
            ]
        )->select('birthday')->first();
        if ($holiday == null) $holiday = 0;
        $birthday = Carbon::parse(Carbon::create($birthday->birthday)->format('Y-m-d'));
        if ($birthday->month == Carbon::now()->month && $birthday->day == Carbon::now()->day) $birthday = true;
        else $birthday = false;
        return response()->json(
            [
                'holiday' => $holiday,
                'birthday' => $birthday,
            ]
        );
    }

    public function changeLoginAndPassword(StudentChangeLP $request, Student $student)
    {
        $validated = $request->validated();
        $student = $student->getTokenId($request->header('token'));
        $student = Student::find($student['id']);
        $student->update(
            [
                'login' => $request->login,
                'password' => Hash::make($request->password),
            ]
        );
        return response()->json('Данные изменились');
    }
}
