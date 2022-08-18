<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'category', 'img', 'description', 'day', 'month', 'year','delete'];
    static $categorys=[
        [
            'id'=>0,
            'title'=>"Объяснительный за систематично опаздований",
            'short'=>"СО",
        ],
        [
            'id'=>1,
            'title'=>"Объяснительный за нарушение внутреннего распорядка",
            'short'=>"НВР",
        ],
        [
            'id'=>2,
            'title'=>"Объяснительный за нарушение пропуски без уважительных причин",
            'short'=>"НПБУП",
        ],
        [
            'id'=>3,
            'title'=>"Объяснительный за нарушение опаздывание ДПС",
            'short'=>"НОД",
        ],
        [
            'id'=>4,
            'title'=>"Объяснительный за не выполнения учебной программы",
            'short'=>"НВУП",
        ],
    ];

    static function initCategory($id){
        foreach (Statement::$categorys as $category ){
            if ($category['id']==$id){
                return $category['short'];
            }
        }
        return 'Ошибка';
    }

    public function student()
    {
        return $this->belongsTo(Base_student::class,'student_id','id');
    }

    static function initSeason($date)
    {
        if (Carbon::make($date)->month > 1 && Carbon::make($date)->month < 9) {
            return '2 семестр ' . Carbon::make($date)->year . 'года';
        } else {
            return '1 семестр ' . Carbon::make($date)->year . 'года';
        }
    }

    static function countStateSeason($state, $date)
    {
        if (Carbon::make($date)->month > 1 && Carbon::make($date)->month < 9) {
            return count($state->where('month', '<', 9)->where('month', '>', 1));
        } else {
            return count($state->where('month', '>', 9)->where('month', '=', 1));
        }
    }
}
