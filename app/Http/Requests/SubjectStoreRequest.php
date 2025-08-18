<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectStoreRequest extends FormRequest
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
            "Name_ar"   => "required|string|unique:subjects,name",
             "Grade_id" => "required",
            "Class_id" =>  "required",
            "teacher_id" =>  "required",
        ];
    }
    public function messages(): array
    {
        return [
            "Name_ar.required"   => "الرجاء إدخال الاسم بالعربي.",
            "Name_ar.string"     => "الاسم بالعربي يجب أن يكون نصاً.",
            "Name_ar.unique"     => "الاسم بالعربي مسجّل مسبقاً.",

            "Name_en.required"   => "الرجاء إدخال الاسم بالإنجليزي.",
            "Name_en.string"     => "الاسم بالإنجليزي يجب أن يكون نصاً.",
            "Name_en.unique"     => "الاسم بالإنجليزي مسجّل مسبقاً.",

            "Grade_id.required"  => "الرجاء اختيار المرحلة الدراسية.",
            "Class_id.required"  => "الرجاء اختيار الصف.",
            "teacher_id.required"=> "الرجاء اختيار اسم المعلم.",
        ];
    }

}
