<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestGuidelineProcurement extends FormRequest
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
        $rules = [
            'file_name' => 'nullable',
            'file' => '|file|mimes:pdf,doc,docx',
            'category' => 'nullable',
        ];

        if ($this->isMethod('POST')) {
            $rules['file'] = 'required' . $rules['file'];
        }

        return $rules;
    }
}
