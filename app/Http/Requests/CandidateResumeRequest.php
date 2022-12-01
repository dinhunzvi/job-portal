<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateResumeRequest extends FormRequest
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
            'document_name' => 'required|mimes:pdf,docx,doc|max:2048'
        ];

    }

    /**
     * validation error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'document_name.required'    => 'Select your resume',
            'document_name.mimes'       => 'Resume must be a Pdf or Word document',
            'document_name.max'         => 'Resume must not be larger than 2Mb'
        ];

    }

}
