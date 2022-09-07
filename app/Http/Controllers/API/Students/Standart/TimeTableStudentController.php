<?php

namespace App\Http\Controllers\API\Students\Standart;

use App\Http\Controllers\Controller;
use App\Http\Resources\TimeTableResource;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeTableStudentController extends Controller
{
    private $days_of_the_week = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public function getLessonForWeek(Request $request)
    {
        $date = Carbon::parse(Carbon::create($request->year, $request->month, $request->day));
        $weekFirstDay = Carbon::parse($date->startOfWeek());
        $weekLastDay = Carbon::parse($date->endOfWeek());
        $timeTable = Timetable::with('subjectInf', 'workerInf')->where(
            'date', '>=', $weekFirstDay->format('Y-m-d')
        )->where(
            'date', '<', $weekLastDay->format('Y-m-d')
        )->where(
            'delete', '=', 0
        )->where(
            'group', '=', $request->student->base_inf->group
        )->orderBy('date', 'asc')->get();
        if (count($timeTable) == 0) {
            return response()->json(['answer' => 'null']);
        }
        for ($i = 0; $i < 6; $i++) {
            if ($i != 0) {
                $weekFirstDay = $weekFirstDay->addDay(1);
            }
            $day = $timeTable->where('date', $weekFirstDay->format('Y-m-d'));
            if (count($day) > 0) {
                foreach ($day as $lesson) {
                    $tableLessonforWeek[$this->days_of_the_week[$i]][] = new TimeTableResource($lesson);
                }
            } else {
                $tableLessonforWeek[$this->days_of_the_week[$i]][] = 'null';
            }
        }
        return response()->json($tableLessonforWeek);
    }
}
