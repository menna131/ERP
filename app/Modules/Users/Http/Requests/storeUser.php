<?php

namespace Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Users\Models\User;

class storeUser extends FormRequest
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
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
            //    'regex:"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/"',
               'required', 
               'confirmed', 
               'min:6' ],
            'phone'=>['required', 'nullable','digits:11'],
            'password_confirmation'=>['required'],
            'role'=>[ 'required', 'exists:roles,id'],
        ];
    }
    public function messages(){
        return [
            'password.regex' => 'password has to:
                1) contain at least 1 capital letter
                2) be more than 8 characters
                3) contain at least 1 small letter
                4) contain at least 1 special character',
            'password.confirmed' => 'passwords entered are not the same',
        ];
    }
}
