<?php

namespace App\Http\Controllers\Web\Workers\Denary\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class DenaryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $course = $this->groupCourseInit($request->course);

        $groups = Group::with('studentsGroup')->where(
            [
                ['course', '=', $course],
                ['delete', '=', 0],
            ]
        )->select(['id', 'title'])->get();
        return view('worker.denary.groups.index', compact('groups', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('worker.denary.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $group = Group::create(
            [
                'title' => $request->title,
                'course' => $request->course,
                'study' => $request->study
            ]
        );
        if ($group) {
            return redirect()->back()->with('success', 'Группа создана');
        }
        return redirect()->back()->with('warning', 'Группа не создана');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('worker.denary.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Group $group)
    {
        $group->update(
            [
                'title' => $request->title,
                'course' => $request->course,
                'study' => $request->study,
            ]
        );
        if ($group) {
            return redirect()->back()->with('success', 'Группа обновилась');
        }
        return redirect()->back()->with('warning', 'Группа не обновилась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group)
    {

        $group->update(
            [
                'delete' => 1,
            ]
        );
        return redirect()->back()->with('warning', 'Группа не обновилась');
    }




    private function groupCourseInit($course)
    {
        if ($course == null) {
            return $course = 1;
        }
        return $course;
    }
}
