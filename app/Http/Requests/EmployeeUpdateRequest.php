<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EmployeeUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->id), // Ignore the current user ID
            ],
            'card_number' => [
                'nullable',
                'string',
                'min:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{16,}$/',
            ],
            'password' => 'nullable|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'card_number.regex' => 'The password must be at least 16 characters long, contain at least one uppercase letter, one lowercase letter, and one number, and must not include special characters.',
        ];
    }
}
