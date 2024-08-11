<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSpesificProcurementFile extends FormRequest
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
            'file' => 'file|mimes:pdf,doc,docx,xls,xlsx',
            'category' => 'nullable',
        ];

        if ($this->isMethod('post')) {
            $rules['file'] = 'required|' . $rules['file'];
        }

        return $rules;
    }
}
