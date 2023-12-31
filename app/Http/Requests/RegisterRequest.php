<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>['required'],
            'last_name'=>['required'],
            'phone'=>['required', 'regex:/^01[0-2,5,9]{1}[0-9]{8}$/', 'unique:users'],
            'email'=>['required', 'email', 'unique:users,email'],
            'password'=>['required', 'min:8', 'confirmed'],
            'device_name'=>['required'],
        ];
    }
}
