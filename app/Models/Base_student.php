<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base_student extends Model
{
    use HasFactory;

    static $status_family = ["Не женат/Не замужем", "Женат", "Замужем", "Разведён"];
    protected $fillable = ['name', 'surname', 'patronymic', 'passport', 'group', 'citizenship', 'PNFL', 'INN', 'birthday', 'place_birthday', 'year_start', 'sex', 'family_status'];
    protected $table = 'base_students';

    public function title()
    {
        return $this->belongsTo(Group::class, 'group', 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'base_id');
    }

    public function studentPass()
    {
        return $this->hasMany(Pass::class, 'id', 'student_id');
    }

    static function nullDate($date)
    {
        if ($date == null) {
            return '';
        } else {
            Carbon::make($date)->format('d-m-Y');
        }
    }

    static function radioButtonHtmlSex($sex)
    {
        if ($sex == "М") {
            return '<div class="form-check mb-3">
                        <input class="form-check-input" id="validationFormCheck3" type="radio" name="sex" value="Ж" required="" data-bs-original-title="" title="">
                        <label class="form-check-label" for="validationFormCheck3">Ж</label>
                      </div>
                      <div class="form-check mb-3">
                        <input class="form-check-input" id="validationFormCheck3"  checked type="radio" name="sex" value="М" required="" data-bs-original-title="" title="">
                        <label class="form-check-label" for="validationFormCheck3"  >М</label>
                      </div>';
        } elseif ($sex == "Ж") {
            return '<div class="form-check mb-3">
                        <input class="form-check-input" id="validationFormCheck3" checked type="radio" name="sex" value="Ж" required="" data-bs-original-title="" title="">
                        <label class="form-check-label" for="validationFormCheck3">Ж</label>
                      </div>
                      <div class="form-check mb-3">
                        <input class="form-check-input" id="validationFormCheck3" type="radio" name="sex" value="М" required="" data-bs-original-title="" title="">
                        <label class="form-check-label" for="validationFormCheck3">М</label>
                      </div>';
        } else {
            return '<div class="form-check ">
                        <input class="form-check-input" id="validationFormCheck3" type="radio" name="sex" value="Ж" required="" data-bs-original-title="" title="">
                        <label class="form-check-label" for="validationFormCheck3">Ж</label>
                      </div>
                      <div class="form-check ">
                        <input class="form-check-input" id="validationFormCheck3" type="radio" name="sex" value="М" required="" data-bs-original-title="" title="">
                        <label class="form-check-label" for="validationFormCheck3">М</label>
                      </div>';
        }
    }
//    public function studentsCountGroup()
//    {
//    }
}
