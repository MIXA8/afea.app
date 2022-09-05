<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;


    protected $table = 'passes';

    protected $fillable = ['worker_id', 'subject_id', 'student_id', 'pass', 'lesson_part', 'group_id', 'day', 'month', 'year', 'delete'];


    public function groupPasses()
    {
        return $this->belongsTo(Group::class, 'id');
    }

    public function passStudent()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    static function passForm($pass)
    {

        if (count($pass) > 0) {
            if ($pass->first()->pass == 1) {
                return '<option value="0"  class="option_plus valueZero" style="background - color: red;" >+</option>
                                  <option  value="1" class="option_up valueDangerNB" selected>НБ</option>
                                  <option value="2" class="option_nup valueSuccessNB">УП</option>
                                  <option value="3" class="option_op valueLate">ОП</option>';
            } elseif ($pass->first()->pass == 2) {
                return '<option value="0" class="option_plus valueZero" style="background - color: red;" >+</option>
                                  <option value="1" class="option_up valueDangerNB" >НБ</option>
                                  <option value="2" class="option_nup valueSuccessNB" selected>УП</option>
                                  <option value="3" class="option_op valueLate">ОП</option>';
            } elseif ($pass->first()->pass == 3) {
                return '
                                  <option value="0" class="option_plus valueZero" style="background - color: red;" >+</option>
                                  <option value="1" class="option_up valueDangerNB" >НБ</option>
                                  <option value="2" class="option_nup valueSuccessNB" >УП</option>
                                  <option value="3" class="option_op valueLate" selected>ОП</option>';
            } elseif ($pass->first()->pass == 0) {
                return '
                                  <option value="0" class="option_plus  valueZero" style="background - color: red;" selected>+</option>
                                  <option value="1" class="option_up valueDangerNB" >НБ</option>
                                  <option value="2" class="option_nup valueSuccessNB" >УП</option>
                                  <option value="3" class="option_op valueLate" >ОП</option>';
            } else {
                return ' <option value="0" class="option_plus valueZero" style="background - color: red;" selected>+</option>
                                  <option value="1" class="option_up valueDangerNB" >НБ</option>
                                  <option value="2" class="option_nup valueSuccessNB" >УП</option>
                                  <option value="3" class="option_op valueLate" >ОП</option>';
            }
        } else {
            return ' <option value="0" class="option_plus valueThird" style="background - color: red;" selected>+</option>
                                  <option  value="1" class="option_up valueDangerNB">НБ</option>
                                  <option value="2" class="option_nup valueSuccessNB">УП</option>
                                  <option value="3" class="option_op valueLate">ОП</option>';
        }
    }


    static function countPassSeason($pass, $date, $id, $num = 1)
    {
        if (Carbon::make($date)->month > 1 && Carbon::make($date)->month < 9) {
            return count($pass->where('student_id', $id)->where('month', '<', 9)->where('month', '>', 1)->where('pass', $num));
        } else {
            return count($pass->where('student_id', $id)->where('month', '>', 9)->where('month', '=', 1)->where('pass', $num));
        }
    }

    static function initSeason($date)
    {
        if (Carbon::make($date)->month > 1 && Carbon::make($date)->month < 9) {
            return '2 семестр ' . Carbon::make($date)->year . 'года';
        } else {
            return '1 семестр ' . Carbon::make($date)->year . 'года';
        }
    }


    static function typePassHtml($pass)
    {
        if (!empty($pass['pas'])) {
            if ($pass['pas'] == 1) {
                return 'НБ';
            } elseif ($pass['pas'] == 2) {
                return 'УП';
            } elseif ($pass['pas'] == 3) {
                return 'ОП';
            } elseif ($pass['pas'] == null) {
                return 'Ошибка';
            } else {
                return 'Ошибка';
            }
        }
        return '--';
    }

    public function fromHtml($pass)
    {
        if (count($pass) > 0) {
            if ($pass->first()->pass == 1) {
                return 'НБ';
            } elseif ($pass->first()->pass == 2) {
                return 'УП';
            } elseif ($pass->first()->pass == 3) {
                return 'ОП';
            } elseif ($pass->first()->pass == 0) {
                return '+';
            } else {
                return '+';
            }
        } else {
            return '+';
        }
    }

    public function typePass()
    {
        if ($this->pass == 1) {
            return 'НБ';
        } elseif ($this->pass == 2) {
            return 'УП';
        } elseif ($this->pass == 3) {
            return 'ОП';
        } else {
            return 'Ошибка';
        }
    }

}
