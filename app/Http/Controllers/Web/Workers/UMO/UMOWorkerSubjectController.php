<?php

namespace App\Http\Controllers\Web\Workers\UMO;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Workers\WorkerController;
use App\Http\Requests\Web\Workers\UMO\SubjectStoreRequest;
use App\Models\Subject;
use App\Models\Type_lesson;
use App\Models\Worker;

class UMOWorkerSubjectController extends WorkerController
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type_lesson::all();
        $teachers = Worker::where('isteacher', '1')->get(['name', 'id', 'patronymic']);
        return view('worker.umo.subject.create', compact('teachers', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SubjectStoreRequest $request)
    {
        $validated = $request->validated();
        Subject::create(
            [
                'title' => $request->get('title'),
                'type' => $request->get('type'),
                'description' => $request->get('description'),
                'worker_id' => $request->get('worker_id'),
                'colour' => $request->get('colour'),

            ]
        );
        return redirect()->back()->with('success', 'Комната добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $types = Type_lesson::all();
        $teachers = Worker::where('isteacher', '1')->get(['name', 'id', 'patronymic']);
        return view('worker.umo.subject.edit', compact('teachers', 'types', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SubjectStoreRequest $request, $subject)
    {
        $validated=$request->validated();
        $subject=Subject::find($subject);
        $subject->update($request->all());
        return redirect()->back()->with('success','Пара изменена');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {

    }
}
