<?php

namespace Clients\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeClient extends FormRequest
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
            'name'=>['required','string'],
            'phone'=>['nullable','digits:11','unique:clients,phone'],
            'nickname'=>['nullable','string'],
            'address'=>['nullable','string'],
        ];
    }
}
