<?php

namespace Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeSetting extends FormRequest
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
            'preferred_language' => ['required',Rule::in(['en','ar',null])],
            'preferred_theme' => 'required|integer|between:0,2',
            'name' => 'required|min:3',
            'phone' => 'required|nullable|digits:11',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',//|dimensions:max_width=150,max_height=130',
        ];
    }
}