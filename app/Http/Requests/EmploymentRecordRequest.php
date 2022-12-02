<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentRecordRequest extends FormRequest
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
            'company_name'   => 'required',
            'start_date' => 'required|date',
            'end_date'       => 'date|nullable|after:start_date',
            'position'       => 'required',
            'description'    => 'required'
        ];

    }

    /**
     * validation error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'company_name.required' => 'Enter name of company',
            'start_date.date'       => 'Start date is not valid',
            'start_date.required'   => 'Select start date of employment',
            'end_date.date'         => 'Select end date of employment',
            'end_date.after'        => 'End date must be after start date',
            'position.required'     => 'Enter your position at company',
            'description.required'  => 'Describe your duty at company'
        ];

    }


}
