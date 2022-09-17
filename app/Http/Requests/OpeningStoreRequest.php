<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpeningStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool~
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
            'media'=>['nullable','mimetypes:application/vnd.ms-excel,text/xls,text/xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','mimes:xlsx,xls']
        ];
    }
}
