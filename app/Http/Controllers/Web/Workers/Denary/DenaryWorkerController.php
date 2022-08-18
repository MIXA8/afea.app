<?php


namespace App\Http\Controllers\Web\Workers\Denary;


use App\Http\Controllers\Web\Workers\Functions\getStudents;
use App\Http\Controllers\Web\Workers\WorkerController;
use App\Models\Base_student;
use App\Models\Group;
use App\Models\Pass;
use App\Models\Statement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DenaryWorkerController extends WorkerController
{
    use getStudents;


    public function groupPassEdit(Request $request)
    {
        $date = $this->dateAttendance($request->date, $request->mod);
        $group = $this->groupAttendanceForList($request->group);
        $passes = Pass::where(
            [
                ['day', '=', Carbon::create($date)->day],
                ['month', '=', Carbon::create($date)->month],
                ['year', '=', Carbon::create($date)->year],
                ['group_id', '=', $group->id],
                ['delete', '=', 0],
            ]
        )->get();
        $allPass = Pass::where(
            [
                ['group_id', '=', $group->id],
                ['delete', '=', 0],
            ]
        )->get();

        return view('worker.denary.passedit', compact('date', 'group', 'passes', 'allPass'));
    }



    public function addPass(Request $request)
    {
        $pass = Pass::where(
            [
                'subject_id' => '1',
                'student_id' => $request->id,
                'lesson_part' => $request->lesson_part,
                'group_id' => $request->group,
                'day' => Carbon::make($request->date)->day,
                'month' => Carbon::make($request->date)->month,
                'year' => Carbon::make($request->date)->year,
            ]
        )->first();
        if ($pass == null) {
            Pass::create(
                [
                    'worker_id' => Auth::guard('worker')->user()->id,
                    'subject_id' => '1',
                    'student_id' => $request->id,
                    'pass' => $request->pass,
                    'lesson_part' => $request->lesson_part,
                    'group_id' => $request->group,
                    'day' => Carbon::make($request->date)->day,
                    'month' => Carbon::make($request->date)->month,
                    'year' => Carbon::make($request->date)->year,
                ]
            );
        }
        if ($request->pass > 0 && $request->pass < 4) {
            $pass->update(['delete' => 0, 'pass' => $request->pass]);
        } elseif ($request->pass == 0) {
            $pass->update(['delete' => 1, 'pass' => $request->pass]);
        }
    }

    public function changeStudentInformation(Request $request)
    {
        $information = Base_student::where('id', $request->id)->first();
        $information->year_finish = $request->year_finish;
        $information->n_contract = $request->n_contract;
        $information->update($request->all());
        return redirect()->back()->with('success','Студент изменен');
    }

    public function studentInformation(Request $request)
    {
        $date = Carbon::now()->format('d-m-Y');
        $pass = Pass::where('student_id', $request->id)->where('delete', 0)->get();
        $student = Base_student::find($request->id);
        $groups = Group::select(['id', 'title'])->where('delete', 0)->get();
        $statements=Statement::with('student')->where('student_id',$student->id)->get();
        return view('worker.denary.student', compact('student', 'groups', 'pass', 'date','statements'));
    }



    public function studentCreate(Request $request){
        $group=$request->group;
        $groups = Group::select(['id', 'title'])->where('delete', 0)->get();
        return view('worker.denary.students.create',compact('groups','group'));
    }

    public function studentStore(Request $request){
        Base_student::create(
            [
                'name'=>$request->name,
                'surname'=>$request->surname,
                'patronymic'=>$request->patronymic,
                'passport'=>$request->passport,
                'group'=>$request->group,
                'citizenship'=>$request->citizenship,
                'n_contract'=>$request->n_contract,
                'sex'=>$request->sex,
                'family_status'=>$request->family_status,
                'PNFL'=>$request->PNFL,
                'INN'=>$request->INN,
                'birthday'=>$request->birthday,
                'place_birthday'=>$request->place_birthday,
                'year_start'=>$request->year_start,
                'year_finish'=>$request->year_finish,
            ]
        );
//        Base_student::created($request->all());
        return redirect()->back()->with('success','Студент добавлен');
    }


}
