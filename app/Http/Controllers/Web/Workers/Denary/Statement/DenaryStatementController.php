<?php

namespace App\Http\Controllers\Web\Workers\Denary\Statement;

use App\Http\Controllers\Controller;
use App\Models\Base_student;
use App\Models\Statement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DenaryStatementController extends Controller
{

    public $mod;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = (Carbon::make($this->dateAttendance($request->date,$request->mod)));
        $statements = $this->queryStatementBuilder($request, $date);
        $mod=$this->mod;
        $category = $request->category;
        return view('worker.denary.statements.index', compact('date', 'statements', 'category','mod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $student = Base_student::where('id', $request->id)->first();

        return view('worker.denary.statements.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'max:3240',
        ]);
        if ($request->hasFile('img')) {

            $folder = $request->id;
            $img = $request->file('img')->store("statement/{$folder}");
        }
        if ($request->day == null || $request->month == null || $request->year == null) {
            $request->day = Carbon::now()->day;
            $request->month = Carbon::now()->month;
            $request->year = Carbon::now()->year;
        }
        Statement::create(
            [
                'student_id' => $request->id,
                'category' => $request->category,
                'img' => $img,
                'description' => $request->description,
                'day' => $request->day,
                'month' => $request->month,
                'year' => $request->year,
            ]
        );
        return redirect()->back()->with('success', 'Добавленно новое заявление');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Statement $statement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Statement $statement)
    {
        $student = Base_student::where('id', $statement->id)->first();
        return view('worker.denary.statements.edit', compact('student', 'statement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Statement $statement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Statement $statement)
    {
        $student = Base_student::where('id', $statement->id)->first();
        return view('worker.denary.statements.edit', compact('student', 'statement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Statement $statement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Statement $statement)
    {
        $request->validate([
            'img' => 'max:3240',
        ]);
        $img = $statement->img;
        if ($request->hasFile('img')) {
            Storage::delete($statement->img);
            $folder = $request->id;
            $img = $request->file('img')->store("statement/{$folder}");
        }
        $statement->update(
            [
                'category' => $request->category,
                'img' => $img,
                'description' => $request->description,
                'day' => $request->day,
                'month' => $request->month,
                'year' => $request->year,
            ]
        );
        return redirect()->back()->with('success', 'Заявление измененно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Statement $statement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Statement $statement)
    {
        $statement->update(
            [
                'delete' => 1,
            ]
        );
        return redirect()->back()->with('success', 'Заявление удалилась');
    }

    protected function groupCourseInit($course)
    {
        if ($course == null) {
            return $course = 1;
        }
        return $course;
    }

    private function dateAttendance($date, $mod = null)
    {
        if ($date == null) {
            $this->mod=null;
            $date = Carbon::now()->format('Y-m-d');
            return $date;
        }
        if ($mod == 2) {
            $this->mod=$mod;
            $date = Carbon::make($date)->addDay()->format('Y-m-d');
            return $date;
        }
        if ($mod == 1) {
            $this->mod=$mod;
            $date = Carbon::make($date)->subDay()->format('Y-m-d');
            return $date;
        }
        $this->mod=null;
        return $date;
    }

    private function categoryAttendance($category)
    {
        if ($category == null) {
            return $category = 'все';
        }
        return $category;
    }

    private function queryStatementBuilder($request, $date)
    {
        if ($request->category == null) {
            return Statement::with('student')->where('delete', 0)->where('day', $date->day)->where('month', $date->month)->where('year', $date->year)->get();
        }
        return Statement::with('student')->where('delete', 0)->where('day', $date->day)->where('month', $date->month)->where('category', $request->category)->where('year', $date->year)->get();
    }
}
