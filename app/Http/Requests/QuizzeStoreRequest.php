<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizzeStoreRequest extends FormRequest
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
            "name_ar" => "required|string",
            "subject_id" => "required|integer",
            "teacher_id" => "required|integer",
            "Grade_id" => "required|integer",
            "Classroom_id" => "required|integer",
            "section_id" => "required|integer",
        ];
    }
    public function messages(): array
    {
        return [
            "name_ar.required" => " الاسم بالعربي مطلوب.",
            "name_ar.string"   => "الاسم بالعربي يجب أن يكون نصاً.",

            "subject_id.required" => " المادة مطلوب.",
            "subject_id.integer"  => "المادة يجب أن تكون رقم صحيح.",

            "teacher_id.required" => " المعلم مطلوب.",
            "teacher_id.integer"  => "المعلم يجب أن يكون رقم صحيح.",

            "Grade_id.required" => " المرحلة الدراسية مطلوب.",
            "Grade_id.integer"  => "المرحلة الدراسية يجب أن تكون رقم صحيح.",

            "Classroom_id.required" => " الصف مطلوب.",
            "Classroom_id.integer"  => "الصف يجب أن يكون رقم صحيح.",

            "section_id.required" => " القسم مطلوب.",
            "section_id.integer"  => "القسم يجب أن يكون رقم صحيح.",
        ];
    }

}
