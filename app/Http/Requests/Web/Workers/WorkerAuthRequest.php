<?php

namespace App\Http\Requests\Web\Workers;

use Illuminate\Foundation\Http\FormRequest;

class WorkerAuthRequest extends FormRequest
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
            'name'=>'required',
            'surname'=>'required',
            'patronymic'=>'required',
            'department'=>'required|numeric|exists:departments,id',
            'login'=>'required|unique:workers,login',
            'password'=>'required|confirmed',
        ];
    }
}
