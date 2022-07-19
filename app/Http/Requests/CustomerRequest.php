<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'plateNumber'=>'required|regex:/^[АВЕКМНОРСТУХ]\d{3}(?<!000)[АВЕКМНОРСТУХ]{2}\d{2,3}$/u'
        ];
    }

    public function messages()
    {
        return [
            'plateNumber.required'=>'Поле "Государственный номер" является обязательным!',
            'plateNumber.regex'=>'Поле "Государственный номер" должно соответствовать формату номерного знака!'      
        ];
    }
}
