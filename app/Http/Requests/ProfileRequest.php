<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'  => 'required|string',
            'last_name'  => 'required|string',
            'email'  => 'email',
            'phone'  => 'required|string',
            'info'  => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Необходимо заполнить имя',
            'last_name.required' => 'Необходимо заполнить фамилию',
            'phone.required' => 'Необходимо заполнить телефон',
            'email' => 'Необходимо указать e-mail',
            'info.required' => 'Неверный формат информации о себе',
        ];
    }
}
