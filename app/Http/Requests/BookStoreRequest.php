<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            "title" => "required|string|min:3",
            "Grade_id" => "required|integer",
            "Classroom_id" => "required|integer",
            "section_id" => "required|integer",
            "file_name" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "حقل العنوان مطلوب.",
            "title.string"   => "حقل العنوان يجب أن يكون نصاً.",
            "title.min"      => "حقل العنوان يجب ألا يقل عن 3 أحرف.",

            "Grade_id.required" => "المرحلة الدراسية مطلوبة.",
            "Grade_id.integer"  => "المرحلة الدراسية يجب أن تكون رقم صحيح.",

            "Classroom_id.required" => "الفصل الدراسي مطلوب.",
            "Classroom_id.integer"  => "الفصل الدراسي يجب أن يكون رقم صحيح.",

            "section_id.required" => "القسم مطلوب.",
            "section_id.integer"  => "القسم يجب أن يكون رقم صحيح.",

            "file_name.required" => "الملف مطلوب.",
        ];
    }

}
