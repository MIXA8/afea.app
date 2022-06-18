<?php

namespace App\Http\Controllers\Web\Workers\Lord;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Workers\WorkerController;
use App\Http\Requests\Web\Workers\Lord\Department\DepartmentCreateRequest;
use App\Models\Department;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends WorkerController
{

    protected $categorys = ['Кафедра', 'Отдел'];

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
        $categorys = $this->categorys;
        return view('worker.lord.department.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentCreateRequest $request)
    {
        $validate = $request->validated();
        $department = Department::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
        ]);
        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("department/{$department->id}");
            $result = DB::table('departments')->where('id', $department->id)->update([
                'img' => $img
            ]);
        }
        return redirect()->back()->with('success', "{$department->category} добавлена");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $workers = Worker::where('department', $department->id)->where('delete', 0)->select('name', 'surname', 'patronymic', 'id')->get();
        $categorys = $this->categorys;
        return view('worker.lord.department.edit', compact('department', 'categorys', 'workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentCreateRequest $request)
    {
        $department=Department::find($request->department);
//        dd($department);
        $valitdate = $request->validated();
        $department->update($request->all());
        if ($request->hasFile('img')) {
            Storage::delete($department->img);
            $img = $request->file('img')->store("department/{$department->id}");
            $result = DB::table('departments')->where('id', $department->id)->update([
                'img' => $img
            ]);
        }
        return redirect()->back()->with('success', "{$request->category} изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
