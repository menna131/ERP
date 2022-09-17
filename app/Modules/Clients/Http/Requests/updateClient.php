<?php

namespace Clients\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\This;

class updateClient extends FormRequest
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
            'phone'=>['nullable','digits:11','unique:clients,phone,'.$this->route('client')->slug.',slug'],

            'nickname'=>['nullable','string'],
            'address'=>['nullable','string'],
        ];
    }
}
