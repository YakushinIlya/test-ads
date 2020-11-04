<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileImgRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'avatar'  => 'mimes:jpg,jpeg,png,gif',
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' => 'Допустимые форматы файлов: jpg,jpeg,png,gif',
        ];
    }
}
