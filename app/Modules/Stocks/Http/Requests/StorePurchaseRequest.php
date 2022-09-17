<?php
namespace Stocks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
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
            'supplier-name'=> ['required','max:1000','string','min:2'],
            'date'=>['date','nullable'],
            'data.*.product'=>['required'],
            'data.*.price'=>['required','numeric','min:1'],
            'data.*.quantity'=>['required','integer'],
            'payment'=>['required','string','Rule::in(["cash", "install"])'], // between (cash or install)
        ];
    }
}
