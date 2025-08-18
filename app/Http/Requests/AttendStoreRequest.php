<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendStoreRequest extends FormRequest
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
            "grade_id"     => 'required|numeric',
            "classroom_id" => 'required|numeric',
            "section_id"   => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            "grade_id.required"     => "الصف مطلوب.",
            "grade_id.numeric"      => "الصف يجب أن يكون رقم صحيح.",

            "classroom_id.required" => "الفصل مطلوب.",
            "classroom_id.numeric"  => "الفصل يجب أن يكون رقم صحيح.",

            "section_id.required"   => "القسم مطلوب.",
            "section_id.numeric"    => "القسم يجب أن يكون رقم صحيح.",
        ];
    }

}
