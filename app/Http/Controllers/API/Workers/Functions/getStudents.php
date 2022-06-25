<?php


namespace App\Http\Controllers\API\Workers\Functions;


use App\Models\Base_student;
use App\Models\Group;
use Illuminate\Http\Request;

trait getStudents
{
    public function getGroups()
    {
        $groups = Group::where(
            [
                [
                    'study', '=', '1'
                ],
                [
                    'delete', '=', '0'
                ]
            ]
        )->select('id', 'title', 'course')->get();
        return response()->json($groups);
    }

    public function getCourseGroups(Request $request)
    {
        $groups = Group::where(
            [
                [
                    'study', '=', '1'
                ],
                [
                    'course','=',$request->course
                ],
                [
                    'delete', '=', '0'
                ]
            ]
        )->select('id', 'title', 'course')->get();
        return response()->json($groups);
    }

    public function getStudentsGroup($id)
    {
        $students = Base_student::where(
            [
                [
                    'group', '=', $id
                ]
            ]
        )->select('id', 'name', 'surname', 'patronymic')->get();
        return response()->json($students);
    }
}
