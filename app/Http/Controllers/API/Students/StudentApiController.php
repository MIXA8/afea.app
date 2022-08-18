<?php

namespace App\Http\Controllers\API\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\students\StudentAPIAuthRequest;
use App\Http\Requests\API\students\StudentChangeLP;
use App\Http\Resources\BaseStudentResource;
use App\Http\Resources\PostResource;
use App\Models\Base_student;
use App\Models\Department;
use App\Models\Post;
use App\Models\Post_comments;
use App\Models\Student;
use App\Models\Suggestion;
use App\Models\Worker;
use App\Models\Wrating;
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
            'message' => 'Вы успешео зашли на свой аккаунт',
            'token_api' => Student::createToken(Auth::guard('student')->user()->id),
        ], 200);
    }

    public function personalInf(Request $request)
    {
        $information = new BaseStudentResource(Base_student::where('id', $request->student->base_id)->first());
        return response()->json($information);
    }

    public function updatePersonalInf(Request $request)
    {
        $information = Base_student::where('id', $request->student->base_id)->first();
        $information->update($request->all());
        return response()->json(
            [
                'code' => '200',
            ]
        );
    }

    public function changeAvatarImgStore(Request $request, Student $student)
    {
        $request->validate([
            'img' => 'required|max:3240',
        ]);
        if ($request->hasFile('img')) {
            Storage::delete($request->student->img);
            $folder = $request->student->id;
            $img = $request->file('img')->store("students/{$folder}");
            $result = DB::table('students')->where('id', $request->student->id)->update([
                'img' => $img
            ]);
            $student = $student->getTokenId($request->header('token'));
            $src = asset("storage/{$student->img}");
        }
        if ($request->animation == 1 && !$request->hasFile('img')) {
            $result = DB::table('students')->where('id', $request->student->id)->update([
                'img' => $request->img
            ]);
            $src = $request->img;
        }
        return response()->json(
            [
                'img' => $src,
            ]
        );

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
//        $birthday = Base_student::where(
//            [
//                [
//                    'passport', '=', $request->passport
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

    public function changeLoginAndPassword(StudentChangeLP $request)
    {
        $validated = $request->validated();
        $student = Student::getTokenId($request->header('token'));
        $student = Student::find($student->id);
        $student->update(
            [
                'login' => $request->login,
                'password' => Hash::make($request->password),
            ]
        );
        return response()->json(['message' => 'Данные изменились']);
    }

    public function addComment(Request $request, Student $student)
    {
//        $student=$student->getTokenId($request->header('token'));
        Post_comments::create(
            [
                'post_id' => $request->post,
                'user_id' => $request->student->id,
                'worker' => 0,
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

    public function getComment(Request $request)
    {
        $comments = Post_comments::with('student', 'workerG')->where(
            [
                ['post_id', '=', $request->post],
                ['delete', '=', '0'],
            ]
        )->orderByDesc('created_at')->paginate(5);
        if($comments->items()==null) return response()->json(['code'=>300]);
        foreach ($comments as $comment) {
            $com[] = Post_comments::whoIsUser($comment, $comment->worker);
        }
        return response()->json($com);
    }

    public function getDeparmtents(Request $request)
    {
        $department = Department::where(
            [
                ['category', '=', 'Кафедра'],
            ]
        )->get(['id', 'img', 'title']);
        return response()->json($department);
    }

    public function getDeparmtentWorker(Request $request): \Illuminate\Http\JsonResponse
    {
        $worker = Worker::where(
            [
                ['delete', '=', 0],
                ['department', '=', $request->id],
                ['isteacher', '=', '1'],
            ]
        )->get(['name', 'surname', 'patronymic', 'rating', 'img', 'number', 'description']);
        return response()->json($worker);
    }

    public function addRating(Request $request, Wrating $wrating)
    {
        $wrating->addRating($request);
        return response()->json(
            [
                'code' => 200,
            ]
        );
    }

    public function getAccountInform(Request $request)
    {
        return response()->json($request->student);
    }

    public function getPosts(Request $request)
    {
        $posts = Post::with('department')->where(
            [
                ['status', '=', 'Опубликованный'],
                ['delete', '=', 0]
            ]
        )->orderByDesc('created_at')->paginate(5);
        if($posts->items()==null) abort(404);
        foreach ($posts as $post) {
            $allpost[] = new PostResource($post);
        }
        return response()->json($allpost);
    }

    public function createSuggestion(Request $request){
        $suggestion=Suggestion::create([
            'user_id'=>$request->student->id,
            'worker'=>0,
            'suggestion'=>$request->suggestion,
        ]);
        return response()->json([
            'message'=>"Спасибо, вы вносите большой вклад, в развитие платформы",
        ]);
    }



}
