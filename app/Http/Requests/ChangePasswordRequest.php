<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns',
            'old_password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/|confirmed',
            'password_confirmation' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'old_password.required' => 'Vui lòng nhập mật khẩu',
            'old_password.min' => 'Mật khẩu từ 6 ký tự trở lên',
            'old_password.regex' => 'Mật khẩu bao gồm chữ hoa, chữ thường, số',
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.min' => 'Mật khẩu mới từ 6 ký tự trở lên',
            'password.regex' => 'Mật khẩu mới bao gồm chữ hoa, chữ thường, số',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'password_confirmation.required' => 'Xác nhận mật khẩu'
        ];
    }
}
