<?php

namespace Users\Http\Requests;

use Users\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class profileUser extends FormRequest
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
        // dd($this->route('user'));
        return [
            'name' => ['required', 'min:3'],
            'phone'=>['required','nullable','digits:11',
            'unique:users,phone,'.$this->route('user')->slug.',slug'],
        ];
    }
}
