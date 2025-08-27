<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceSearchRequest extends FormRequest
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
            "student_id" => "required",
            'from'       => 'required|date|date_format:Y-m-d',
            'to'         => 'required|date|date_format:Y-m-d|after_or_equal:from',
        ];
    }

    public function messages(): array
    {
        return [
            "student_id.required" => "اختار طالب او اختر الكل",

            "from.required"       => "حدد تاريخ البداية",
            "from.date"           => "تاريخ البداية يجب أن يكون تاريخ صحيح",
            "from.date_format"    => "صيغة تاريخ البداية يجب أن تكون Y-m-d (مثال: 2025-08-27)",

            "to.required"         => "حدد تاريخ النهاية",
            "to.date"             => "تاريخ النهاية يجب أن يكون تاريخ صحيح",
            "to.date_format"      => "صيغة تاريخ النهاية يجب أن تكون Y-m-d (مثال: 2025-08-27)",
            "to.after_or_equal"   => "تاريخ النهاية يجب أن يكون بعد أو يساوي تاريخ البداية",
        ];
    }

}
