<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name'=>'required|min:5',
            'price'=>'required|min:0'
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'Наименование',
            'price'=>'Стоимость'
        ];
    }

    public function messages()
    {
        return [
            '*.required'=>'Поле ":attribute" является обязательным!',
            'name.min'=>'Поле "Наименование должно" содержать минимум 5 знаков!',
            'price.min'=>'Поле "Стоимость" не может содержать отрицательное значение!'            
        ];
    }
}
