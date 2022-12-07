<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return $this->isMethod( 'POST' ) ? $this->store() : $this->update();

    }

    /**
     * validation rules for storing a user
     * @return string[]
     */
    public function store(): array
    {
        return [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',
        ];

    }

    /**
     * validation rules for updating a user
     * @return string[]
     */
    public function update(): array
    {
        return [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email,' . $this->user->id,
        ];

    }

    /**
     * validation error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'first_name.required'   => 'Enter your first name',
            'last_name.required'    => 'Enter your last name',
            'email.required'        => 'Enter your email address',
            'email.email'           => 'Your email address is not valid',
            'email.unique'          => 'Email address already registered'
        ];

    }

}
