<?php


namespace App\Http\Controllers\Web\Workers\Functions;


use App\Models\Base_student;
use App\Models\Group;
use App\Models\Pass;
use App\Models\Statement;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait getStudents
{

    public function getStudentsAttendance(Request $request)
    {
        $date = $this->dateAttendance($request->date, $request->mod);
        $course = $this->courseAttendance($request->course);
        $match = $this->matchAttendance($request->match);
        $groups = $this->groupAttendance($course);
        return view('worker.standart.getstudent.index', compact(['date', 'match', 'course', 'groups']));
    }

    protected function dateAttendance($date, $mod = null)
    {
        if ($date == null) {
            $date = Carbon::now()->format('Y-m-d');
            return $date;
        }
        if ($mod == 2) {
            $date = Carbon::make($date)->addDay()->format('Y-m-d');
            return $date;
        }
        if ($mod == 1) {
            $date = Carbon::make($date)->subDay()->format('Y-m-d');
            return $date;
        }
        return $date;
    }

    protected function courseAttendance($course)
    {
        if ($course == null || $course > 5 || $course < 0) {
            $course = 1;
            return $course;
        }
        return $course;
    }

    protected function matchAttendance($match)
    {
        if ($match == null || $match < 0 || $match > 6) {
            $match = 1;
            return $match;
        }
        return $match;
    }

    protected function groupAttendance($course)
    {
        $groups = Group::with('studentsGroup')->where(
            [
                ['course', '=', $course],
                ['study', '=', 1],
                ['delete', '=', 0],
            ]
        )->get();
        return $groups;
    }

    public function groupPassPDF(Request $request)
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
        return view('worker..standart.getstudent.htmlpdf', compact('date', 'group', 'passes', 'allPass'));
    }

    protected function groupAttendanceForList($id)
    {
        $group = Group::with(['studentsGroup'])->where(
            [
                ['id', '=', $id],
                ['study', '=', 1]
            ]
        )->first();
        return $group;
    }

    public function studentInformationAll(Request $request)
    {
        $date = Carbon::now()->format('d-m-Y');
        $pass = Pass::where('student_id', $request->id)->where('delete', 0)->get();
        $student = Base_student::with('title')->find($request->id);
        $statements = Statement::with('student')->where('student_id', $student->id)->where('delete',0)->get();
        return view('worker.standart.getstudent.informstudent', compact('date', 'pass', 'student', 'statements'));
    }

    protected function initSeason($date)
    {
        if (Carbon::make($date)->month > 1 && Carbon::make($date)->month < 9) {
            return '1';
        }
        return '2';
    }

    protected function studentPassSeason($pass, $id, $season = 1)
    {
        if ($pass == null) {
            if ($season == 1) {
                return $pass = Pass::where('student_id', $id)->where('delete', 0)->where('month', '>', 1)->where('month', '<', 9)->get();
            }
            return $pass = Pass::where('student_id', $id)->where('delete', 0)->where('month', '<=', 1)->where('month', '>=', 9)->get();
        } elseif ($pass > 0 && $pass < 4) {
            if ($season == 1) {
                return $pass = Pass::where('student_id', $id)->where('pass', $pass)->where('delete', 0)->where('month', '>', 1)->where('month', '<', 9)->get();
            }
            return $pass = Pass::where('student_id', $id)->where('pass', $pass)->where('delete', 0)->where('month', '<=', 1)->where('month', '>=', 9)->get();
        } else {
            abort(404);
        }

    }

    public function studentPassAll(Request $request)
    {
        $date = $this->dateAttendance($request->date, $request->mod);
        $season = $this->initSeason($date);
        $allPass = $this->studentPassSeason(null, $request->id, $season);
        $pass = $this->studentPassSeason($request->pas, $request->id, $season);
        $student = Base_student::with('title')->find($request->id);
        $statements = Statement::with('student')->where('student_id', $student->id)->where('delete',0)->get();
        return view('worker.standart.getstudent.studentpass', compact('date', 'pass', 'student', 'allPass', 'statements'));
    }

    public function studentStatementAll(Request $request)
    {
        $date = $this->dateAttendance($request->date, $request->mod);
        $season = $this->initSeason($date);
        $allPass = $this->studentPassSeason(null, $request->id, $season);
        $pass = $this->studentPassSeason($request->pas, $request->id, $season);
        $student = Base_student::with('title')->find($request->id);
        $statements = Statement::with('student')->where('student_id', $student->id)->where('delete',0)->get();
        return view('worker.standart.getstudent.statementstudent', compact('date', 'pass', 'student', 'allPass', 'statements'));
    }


    public function showStatement(Statement $statement)
    {
        $student = Base_student::where('id', $statement->id)->first();
        return view('worker.denary.statements.show', compact('student', 'statement'));
    }

    public function studentsGroup(Request $request){
        $group=Group::where('id',$request->group)->first();
        $students=Base_student::where('group',$request->group)->get();
        return view('worker.standart.getstudent.liststudent',compact('students','group'));
    }
}
