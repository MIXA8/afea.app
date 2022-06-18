<?php

namespace App\Http\Controllers\Web\Workers\UMO;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Workers\WorkerController;
use App\Http\Requests\Web\Workers\UMO\TeacherAddStoreRequest;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UMOWorkerTeacherController extends WorkerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worker.umo.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeacherAddStoreRequest $request)
    {
        $validated = $request->validated();
        $loginbusy=true;
        $password='M9ouu9FM';
        while($loginbusy){
            $loginbusy=Worker::where('login',$password)->first();
            $password=Str::random(8);
        }
        Worker::create(
            [
                'name'=>$request->get('name'),
                'surname'=>$request->get('surname'),
                'patronymic'=>$request->get('patronymic'),
                'department'=>$request->get('department'),
                'login'=>Str::random(8),
                'isteacher'=> true,
                'password'=>Hash::make('987654321'),
            ]
        );
        return redirect()->back()->with('success','Комната добавлена');
    }


    public function show($worker_id)
    {
        $teacher=Worker::where('id',$worker_id)->first();
        return view('worker.umo.teacher.show',compact('teacher'));
    }
}
