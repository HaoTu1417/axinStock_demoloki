<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {//(?=.*[!$#%])
        return [
            'username' => 'required|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|email:rfc,dns',
            'cmnd' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/|confirmed',
            'password_confirmation' =>'required',
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
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu từ 6 ký tự trở lên',
            'password.regex' => 'Mật khẩu bao gồm chữ hoa, chữ thường, số',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'password_confirmation.required' => 'Xác nhận mật khẩu'
        ];
    }
}
