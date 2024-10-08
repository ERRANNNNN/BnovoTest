<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'second_name' => 'required',
            'phone_number' => 'required|unique:guests|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'email' => 'unique:guests',
            'country' => 'string',
        ];
    }
}
