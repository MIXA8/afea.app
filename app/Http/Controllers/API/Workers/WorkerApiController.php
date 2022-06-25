<?php

namespace App\Http\Controllers\API\Workers;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\workers\WorkerChangeLP;
use App\Models\Post;
use App\Models\Post_comments;
use App\Models\Profile;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

//    public function holidays(Request $request)
//    {
//        $now = date('Y-m-d');
//        $holiday = Holidays::where('date', '<=', $now)
//            ->orWhere(
//                [
//                    [
//                        'long_days', '>=', $now,
//                    ],
//                    [
//                        'date', '<=', $now,
//                    ]
//                ]
//            )
//            ->select('id', 'title')->first();
//        $birthday = Profile::where(
//            [
//                [
//                    'worker_id', '=', $request->worker_id
//                ]
//            ]
//        )->select('birthday')->first();
//        if ($holiday == null) $holiday = 0;
//        $birthday = Carbon::parse(Carbon::create($birthday->birthday)->format('Y-m-d'));
//        if ($birthday->month == Carbon::now()->month && $birthday->day == Carbon::now()->day) $birthday = true;
//        else $birthday = false;
//        return response()->json(
//            [
//                'holiday' => $holiday,
//                'birthday' => $birthday,
//            ]
//        );
//    }


    public function changeAvatarImgStore(Request $request, Worker $worker)
    {
        $request->validate([
            'img' => 'required|max:3240',
        ]);
        $worker = $worker->getTokenId($request->header('token'));
        if ($request->hasFile('img')) {
            Storage::delete($worker->img);
            $folder = $worker->id;
            $img = $request->file('img')->store("workers/{$folder}");
            $result = DB::table('workers')->where('id', $worker->id)->update([
                'img' => $img
            ]);
        }
        $worker = $worker->getTokenId($request->header('token'));
        $src = asset("storage/{$worker['img']}");
        return response()->json(
            [
                'img' => $src,
            ]
        );
    }

    public function changeLoginAndPassword(WorkerChangeLP $request, Worker $worker)
    {
        $validated = $request->validated();
        $worker = $worker->getTokenWorker($request->header('token'));
        $worker->update(
            [
                'login' => $request->login,
                'password' => Hash::make($request->password),
            ]
        );
        return response()->json('Данные изменились');
    }

    public function addComment(Request $request)
    {
        Post_comments::create(
            [
                'post_id' => $request->post,
                'user_id' => $request->worker->id,
                'worker' => 1,
                'comment' => $request->comment,
            ]
        );
        $post = Post::find($request->post);
        $post->comment = $post->comment + 1;
        $post->save();
        return response()->json(
            [
                'code' => 200,
            ]
        );
    }

    public function accountInf(Request $request){
        return response()->json($request->worker);
    }

    public function personalInf(Request $request)
    {
//        dd($request->worker);
        $information = Profile::where('worker_id', $request->worker->id)->get(['passport', 'citizenship', 'citizenship', 'PNFL', 'INN', 'birthday', 'place_birthday', 'year_start', 'sex', 'family_status'])->first();
//        dd($information);
        if ($information == null) return response()->json(['inform' => 'NULL']);
        return response()->json($information);
    }

    public function updatePersonalInf(Request $request)
    {
        $information = Profile::firstOrNew([
            'worker_id' => $request->worker->id
        ]);
        $information->passport = $request->passport;
        $information->citizenship = $request->citizenship;
        $information->PNFL = $request->PNFL;
        $information->INN = $request->INN;
        $information->birthday = $request->birthday;
        $information->place_birthday = $request->place_birthday;
        $information->year_start = $request->year_start;
        $information->sex = $request->sex;
        $information->family_status = $request->family_status;
        $information->save();
        return response()->json(
            [
                'code' => '200',
            ]
        );
    }


}
