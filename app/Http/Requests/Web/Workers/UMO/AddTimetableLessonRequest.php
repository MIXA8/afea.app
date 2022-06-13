<?php

namespace App\Http\Requests\Web\Workers\UMO;

use Illuminate\Foundation\Http\FormRequest;

class AddTimetableLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject'=>'required',
            'room'=>'required',
            'group'=>'required',
            'worker_id'=>'required|numeric',
            'time_start'=>'required',
            'time_finish'=>'required',
            'day'=>'required|numeric',
            'month'=>'required',
            'year'=>'required',
        ];
    }
}
