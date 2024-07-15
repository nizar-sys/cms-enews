<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobListRequest extends FormRequest
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
            'position' => 'required|max:50',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
            'vacancy_deadline' => 'required|date',
            'current_status' => 'required|max:50'
        ];

        if ($this->isMethod('post')) {
            $rules['file'] = 'required|' . $rules['file'];
        }

        return $rules;
    }
}
