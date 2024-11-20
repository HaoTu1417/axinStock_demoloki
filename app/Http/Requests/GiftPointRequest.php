<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftPointRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_receive' => 'required',
            'email' => 'required|email:rfc,dns',
            'point' => 'required|integer|digits_between:3,10|min:100'
        ];
    }

    public function messages()
    {
        return [
            'user_receive.required' => 'Vui lòng nhập tên người nhận',
            'email.required' => 'Vui lòng nhận email',
            'email.email' => 'Vui lòng nhập email đúng định dạng',
            'point.required' => 'Vui lòng nhập số bạc chuyển',
            'point.integer' => 'Số bạc chuyển sai định dạng',
            'point.digits_between' => 'Vui lòng chuyển 100 bạc trở lên',
            'point.min' => 'Vui lòng chuyển 100 bạc trở lên'
        ];
    }
}
