<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'username' => 'required|numeric|digits:10',
            'password' => 'required|min:6'
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Nhập số điện thoại',
            'username.numeric' => 'Vui lòng nhập số điện thoại hợp lệ',
            'username.digits' => 'Vui lòng nhập số điện thoại hợp lệ',
            'password.required' => 'Nhập mật khẩu',
            'password.min' => 'Mật khẩu từ 6 ký tự trở lên',
        ];
    }
}