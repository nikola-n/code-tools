<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\AuthorTest;

class CourseRequest extends FormRequest {
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
            'name' => 'required|max:200',
            'type' => 'required',
            'medium' => 'required',
            'level' => 'required',
            'url' => 'required',
            'user_id' =>'in:'.auth()->user()->id,
        ];

    }
}
