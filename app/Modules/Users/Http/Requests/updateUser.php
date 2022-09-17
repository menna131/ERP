<?php

namespace Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Users\Models\User;

class updateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3'],
            'phone'=>['required','nullable','digits:11','unique:users,phone,'.$this->route('user')->slug.',slug',],
            'role'=>['required','exists:roles,id'],
        ];
    }
}
