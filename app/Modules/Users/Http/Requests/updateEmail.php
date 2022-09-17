<?php

namespace Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateEmail extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email']
        ];
    }
    public function messages(){
        return [
            'email.unique' => 'New email is the same as the old mail',
        ];
    }
}