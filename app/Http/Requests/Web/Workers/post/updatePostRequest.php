<?php

namespace App\Http\Requests\Web\Workers\post;

use Illuminate\Foundation\Http\FormRequest;

class updatePostRequest extends FormRequest
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
            'title' => 'required',
            'text' => 'required',
            'shorts' => 'required',
            'img' => 'image|max:3072',
            'worker_id' => 'required',
        ];
    }
}
