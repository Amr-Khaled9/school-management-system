<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectUpdateRequest extends FormRequest
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
            "Name_ar" => "required|string|unique:subjects,name," . $this->id,
            "Grade_id" => "required",
            "Class_id" =>  "required",
            "teacher_id" =>  "required",
        ];
    }
    public function messages(): array
    {
        return [
            "Name_ar.required"   => "الاسم بالعربي مطلوب.",
            "Name_ar.string"     => "الاسم بالعربي يجب أن يكون نصاً.",
            "Name_ar.unique"     => "الاسم بالعربي مستخدم من قبل.",

            "Name_en.required"   => "الاسم بالإنجليزي مطلوب.",
            "Name_en.string"     => "الاسم بالإنجليزي يجب أن يكون نصاً.",
            "Name_en.unique"     => "الاسم بالإنجليزي مستخدم من قبل.",

            "Grade_id.required"  => "المرحلة الدراسية مطلوبة.",
            "Class_id.required"  => "الصف مطلوب.",
            "teacher_id.required"=> "اسم المعلم مطلوب.",
        ];
    }
}
