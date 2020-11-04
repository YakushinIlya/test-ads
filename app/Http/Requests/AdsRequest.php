<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'head'  => 'required|string',
            'category'  => 'required|integer',
            'avatar'  => 'mimes:jpeg,png,jpg,gif|max:5048',
            'body' =>  'required|string',
            'price' =>  'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'head.required' => 'Необходимо заполнить заголовок объявления',
            'category.required' => 'Необходимо выбрать категорию объявления',
            'avatar.mimes' => 'Неверный формат изображения',
            'body.required' => 'Необходимо заполнить текст объявления',
            'price.required' => 'Необходимо указать цену объявления',
        ];
    }
}
