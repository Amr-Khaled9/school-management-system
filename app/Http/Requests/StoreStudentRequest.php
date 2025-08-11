<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            "name_ar" => 'required|string',
            "name_en" => 'required|string',
            "email" => 'required|email',
            "password" => 'required',
            "gender" => 'required|string',
            "nationalitie_id" => 'required|integer',
            "blood_id" => 'required|integer',
            "date_birth" => 'required',
            "grade_id" => 'required|integer',
            "classroom_id" => 'required|integer',
            "section_id" => 'required|integer',
            "parent_id" => 'required|integer',
            "academic_year" => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            "name_ar.required" => "حقل الاسم بالعربي مطلوب.",
            "name_ar.string" => "الاسم بالعربي يجب أن يكون نصاً.",

            "name_en.required" => "حقل الاسم بالإنجليزي مطلوب.",
            "name_en.string" => "الاسم بالإنجليزي يجب أن يكون نصاً.",

            "email.required" => "البريد الإلكتروني مطلوب.",
            "email.email" => "يجب إدخال بريد إلكتروني صحيح.",

            "password.required" => "كلمة المرور مطلوبة.",

            "gender.required" => "النوع مطلوب.",
            "gender.string" => "النوع يجب أن يكون نصاً.",

            "nationalitie_id.required" => "الجنسية مطلوبة.",
            "nationalitie_id.integer" => "الجنسية يجب أن تكون رقم صحيح.",

            "blood_id.required" => "فصيلة الدم مطلوبة.",
            "blood_id.integer" => "فصيلة الدم يجب أن تكون رقم صحيح.",

            "date_birth.required" => "تاريخ الميلاد مطلوب.",

            "grade_id.required" => "الصف الدراسي مطلوب.",
            "grade_id.integer" => "الصف الدراسي يجب أن يكون رقم صحيح.",

            "classroom_id.required" => "الفصل مطلوب.",
            "classroom_id.integer" => "الفصل يجب أن يكون رقم صحيح.",

            "section_id.required" => "القسم مطلوب.",
            "section_id.integer" => "القسم يجب أن يكون رقم صحيح.",

            "parent_id.required" => "ولي الأمر مطلوب.",
            "parent_id.integer" => "ولي الأمر يجب أن يكون رقم صحيح.",

            "academic_year.required" => "السنة الدراسية مطلوبة.",
            "academic_year.integer" => "السنة الدراسية يجب أن تكون رقم صحيح.",
        ];
    }
}
