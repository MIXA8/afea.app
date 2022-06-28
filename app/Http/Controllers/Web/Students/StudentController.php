<?php

namespace App\Http\Controllers\Web\Students;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Post;
use App\Models\Post_comments;
use App\Models\Student;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

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


    public function changeAvatarImgStore(Request $request, Student $student)
    {
        $id = $student->getTokenId($request->header('token'));
        return response()->json($id);
    }

    public function getComment(Request $request)
    {
        $comments = Post_comments::with('student','workerG')->select(['comment','user_id','id','worker'])->where(
            [
                ['post_id', '=', $request->post],
                ['delete', '=', '0'],
            ]
        )->paginate(2);
        foreach ($comments as $comment) {
            $com[]=new CommentResource($comment);
        }
        return \response()->json($com);
    }




    public function trueComment($id, bool $worker)
    {
        return Student::where('id', $id)->get('img');
    }

}
