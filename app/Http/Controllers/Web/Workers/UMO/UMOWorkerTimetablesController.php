<?php

namespace App\Http\Controllers\Web\Workers\UMO;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Workers\UMO\AddTimetableLessonRequest;
use App\Models\Group;
use App\Models\Room;
use App\Models\Subject;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UMOWorkerTimetablesController extends Controller
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
        $subjects = Subject::with('worker')->get();
        $rooms = Room::get();
        $groups = Group::where(
            [
                [
                    'study',
                    '=',
                    '1'
                ],
                [
                    'delete',
                    '=',
                    '0'
                ]
            ]
        )->get();
        return view('worker.umo.timetable.create', compact('subjects', 'rooms', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTimetableLessonRequest $request)
    {
//        dd($request->date);
        $validated=$request->validated();
//        $request->date='1';
        Timetable::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Timetable $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Timetable $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        $subjects = Subject::with('worker')->get();
        $rooms = Room::get();
        $groups = Group::where(
            [
                [
                    'study',
                    '=',
                    '1'
                ],
                [
                    'delete',
                    '=',
                    '0'
                ]
            ]
        )->get();
        return view('worker.umo.timetable.edit', compact('subjects', 'rooms', 'groups','timetable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Timetable $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(AddTimetableLessonRequest $request, Timetable $timetable)
    {
        $validated=$request->validated();
        $timetable->update($request->all());
        return redirect()->back()->with('success','Пара в расписание изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Timetable $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        //
    }
}
