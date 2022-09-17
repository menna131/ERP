<?php

namespace Suppliers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateSupplier extends FormRequest
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
            'name'=>['required','string','unique:suppliers,name,'.$this->route('supplier')->slug.',slug'],
            'phone'=>['nullable','digits:11','unique:suppliers,phone,'.$this->route('supplier')->slug.',slug'],
            'nickname'=>['nullable','string'],
            'address'=>['nullable','string'],
            'media'=>['nullable','array'],
            'media.*'=>['nullable','mimes:docx,xlsx,pdf,txt','max:10000',]
        ];
    }
}
