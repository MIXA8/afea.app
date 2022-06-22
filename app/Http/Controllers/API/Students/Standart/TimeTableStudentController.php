<?php

namespace App\Http\Controllers\API\Students\Standart;

use App\Http\Controllers\Controller;
use App\Http\Resources\TimeTableResource;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeTableStudentController extends Controller
{
    public function getLessonForWeek(Request $request)
    {
        $date = Carbon::parse(Carbon::create('2022', '9', 2));
        $weekFirstDay = Carbon::parse($date->startOfWeek());
        $weekLastDay = Carbon::parse($date->endOfWeek());
        $timeTable = Timetable::with('subjectInf')->where(
            'date', '>=', $weekFirstDay->format('Y-m-d')
        )->where(
            'date','<=',$weekLastDay->format('Y-m-d')
        )->where(
            'delete','=',0
        )->orderBy('date','asc')->get();
        foreach ($timeTable as $lesson){
            $tableLessonforWeek[]=new TimeTableResource($lesson);
        }
//        var_dump(1);
        return response()->json($tableLessonforWeek);
//        dd($timeTable);
//        return new TimeTableResource($timeTable);
    }
}
