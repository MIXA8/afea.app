<?php

namespace App\Http\Controllers\API\Workers\Denary;

use App\Http\Controllers\API\Workers\Functions\getStudents;
use App\Http\Controllers\API\Workers\WorkerApiController;
use App\Models\Pass;
use App\Models\Worker;
use Illuminate\Http\Request;

class DenaryWorkerApiController extends WorkerApiController
{
    use getStudents;

    public function addPass(Request $request)
    {
        $worker_id = Worker::getToken($request->header('token'));
        $message = $this->checkStudentRequestAttendances($request);
        foreach ($request->students as $student) {
            Pass::create(
                [
                    'worker_id' => $worker_id,
                    'subject_id' => $request->subject_id,
                    'student_id' => $student,
                    'group_id' => $request->group,
                    'pass' => $request->pass,
                    'lesson_part' => $request->lesson_part,
                    'day' => $request->day,
                    'month' => $request->month,
                    'year' => $request->year,
                ]
            );
        }
        return response()->json($message);
    }

    protected function checkStudentRequestAttendances(Request $request): string
    {
        $data = date("Y-m-d");
        $request_tab = Pass::where('lesson_part', '=', $request->lesson_part)
            ->where('group_id', '=', $request->group)
            ->whereDay('created_at', '=', date("d"))
            ->whereYear('created_at', '=', date("Y"))
            ->whereMonth('created_at', '=', date("m"))
            ->exists();
        if ($request_tab) {
            $delete = Pass::where('lesson_part', '=', $request->lesson_part)
                ->where('group_id', '=', $request->group)
                ->whereDay('created_at', '=', date("d"))
                ->whereYear('created_at', '=', date("Y"))
                ->whereMonth('created_at', '=', date("m"))
                ->update(
                    [
                        'delete'=>'1'
                    ]
                );
            return 'Данные пропусков перезаписаны';
        } else {
            return 'Данные пропусков сохранены';
        }
    }

}
