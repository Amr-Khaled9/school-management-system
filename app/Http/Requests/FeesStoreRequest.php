<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesStoreRequest extends FormRequest
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
            "title_ar" => "required|string",
            "title_en" => "required|string",
            "amount" => "required|numeric",
            "Grade_id" => "required",
            'Classroom_id' => 'required|integer|unique:fees,classroom_id,'.$this->id,
            "year" => "required",
            "description" => "nullable",
        ];
    }
    public function messages(): array
    {
        return [
            "title_ar.required"   => "  العنوان بالعربية مطلوب.",
            "title_ar.string"     => "  العنوان بالعربية يجب أن يكون نصًا.",

            "title_en.required"   => "  العنوان بالإنجليزية مطلوب.",
            "title_en.string"     => "  العنوان بالإنجليزية يجب أن يكون نصًا.",

            "amount.required"     => "  المبلغ مطلوب.",
            "amount.integer"      => "  المبلغ يجب أن يكون رقمًا صحيحًا.",

            "Grade_id.required"   => "  المرحلة الدراسية مطلوب.",
            "Classroom_id.required" => "  الصف الدراسي مطلوب.",
            "Classroom_id.unique" => 'موجود مسبقا',

            "year.required"       => "  السنة مطلوب.",

            "description.nullable" => " الوصف اختياري.",
        ];
    }

}
