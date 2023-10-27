<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
{
    return [
        'name' => ['required', 'string', 'max:256', 'min:3'],
            'price' => ['required', 'numeric', 'between:500,99999.99'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'other_people_price' => ['required', 'numeric'],
            'image' => ['required', 'max:1000', 'mimes:png,jpg,jpeg'],
    ];
}

}