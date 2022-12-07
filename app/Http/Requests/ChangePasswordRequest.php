<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'current'               => 'required',
            'password'              => [ 'required', Password::default(), 'confirmed' ],
            'password_confirmation' => [ 'required', Password::default() ]
        ];

    }

    /**
     * validation error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'current.required'              => 'Enter your current password',
            'password.required'             => 'Enter your new password',
            'password.Password::default()'  => 'New password is not strong enough. Include digits and special characters',
            'password.confirmed'            => 'Confirm your new password',
            'password_confirmation.required'=> 'Confirm your new password',
        ];

    }

}
