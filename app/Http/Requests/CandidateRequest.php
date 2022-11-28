<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
     * validation rules for storing a candidate
     * @return string[]
     */
    public function store(): array
    {
        return [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',
            'id_number'     => 'required|alpha|unique:users,id_number',
            'dob'           => 'required|date',
            'gender'        => 'required|in:Female,Male',
        ];

    }

    /**
     * validation rules for updating a candidate
     * @return string[]
     */
    public function update(): array
    {
        return [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email,' . $this->user->id,
            'id_number'     => 'required|alpha|unique:users,id_number,' . $this->user->id,
            'dob'           => 'required|date',
            'gender'        => 'required|in:Female,Male',
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
            'email.email'           => 'Email address is not valid',
            'email.unique'          => 'Email address already registered',
            'id_number.required'    => 'Enter your national ID number',
            'id_number.alpha'       => 'National ID number should have alpha-numeric characters only',
            'id_number.unique'      => 'National ID number already registered',
            'dob.required'          => 'Select your date of birth',
            'dob.date'              => 'Date of birth is not valid',
            'gender.required'       => 'Select your gender',
            'gender.in'             => 'Gender must either be Female or Male',
        ];

    }

}