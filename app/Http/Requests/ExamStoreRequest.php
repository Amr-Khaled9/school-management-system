<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamStoreRequest extends FormRequest
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
            "Name_ar" => "required|string",
             "term" => "required",
            "academic_year" => "required"
        ];
    }
    public function messages()
    {
        return[
            'Name_ar.required'=>'الاسم مطلوب',
            'term.required'=>'الترم مطلوب',
            'academic_year.required'=>'العام مطلوب'
        ];
    }
}
