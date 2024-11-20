<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RechargeCardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|min:1',
            'pin' => 'required',
            'serial' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Vui lòng chọn loại thẻ',
            'type.min' => 'Vui lòng chọn loại thẻ',
            'pin.required' => 'Vui lòng nhập mã thẻ cào',
            'serial.required' => 'Vui lòng nhập serial thẻ cào'
        ];
    }
}
