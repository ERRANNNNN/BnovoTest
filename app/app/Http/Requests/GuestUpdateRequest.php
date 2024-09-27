<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|sometimes|string',
            'second_name' => 'required|sometimes|string',
            'phone_number' => 'required|sometimes|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|unique:guests,phone_number,' . $this->segments()[2],
            'email' => 'email|required|sometimes|unique:guests,email,' . $this->segments()[2],
        ];
    }
}
