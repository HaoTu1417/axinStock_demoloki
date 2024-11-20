<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionUpdateRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'uid' => 'required',
            'name' => 'required',
            'action' => 'required'
        ];
    }

    public function messages(){
        return [
            'uid.required' => 'Vui lòng chọn nhân vật',
            'action.required' => 'Vui lòng chọn thao tác'
        ];
    }
}