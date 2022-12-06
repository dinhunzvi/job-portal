<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateDocumentRequest extends FormRequest
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
            'document_name' => 'required|mimes:pdf,doc,docx|max:2048',
            'document_type' => 'required'
        ];

    }

    /**
     * validation error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'document_name.required'    => 'Select the document to upload',
            'document_name.mimes'       => 'Document must be a PDF or Word document only',
            'document_name.max'         => 'Document must not be larger than 2Mb in size',
            'document_type.required'    => 'Enter the type of document to be uploaded',
        ];

    }

}
