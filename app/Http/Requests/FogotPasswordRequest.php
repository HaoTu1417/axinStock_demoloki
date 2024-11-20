<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FogotPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|email:rfc,dns',
            'cmnd' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tài khoản',
            'username.regex' => 'Vui lòng nhập tài khoản hợp lệ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'cmnd.required' => 'Vui lòng nhập cmnd',
            'phone.required' => 'Vui lòng nhập số điện thoại'
        ];
    }
}
