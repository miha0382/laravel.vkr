<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fioInput'=>'required',
            'phoneNumberInput'=> ['required', 'regex:/^(8|\\+7)[0-9]{10}$/'],
            'emailInput'=> ['required', 'email']
        ];
    }

    public function attributes()
    {
        return [
            'fioInput'=>'ФИО',
            'phoneNumberInput'=>'Номер телефона',
            'emailInput'=>'Электронная почта'
        ];
    }

    public function messages()
    {
        return [
            '*.required'=>'Поле ":attribute" является обязательным!',
            'phoneNumberInput.regex'=>'Значение в поле "Номер телефона" не соответствует заданному формату!',
            'emailInput.email'=>'Значение в поле "Электронная почта" не соответствует заданному формату!',
            '*.unique'=>'Значение в поле ":attribute" уже имеется в базе данных!'
        ];
    }

}
